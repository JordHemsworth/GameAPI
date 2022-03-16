<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function load()
    {

        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;
        
        $recentlyReviewedUnformatted = Cache::remember('recently-reviewed', 100, function () use ($before, $current) {
            
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])        
                ->withBody(                                                     /* Get the 12 highest rated games with their name and rating */
                    'fields name, cover, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;                                           
                    where platforms = (48,49,130,6)
                    & ( first_release_date >= '.$before.' 
                    & first_release_date < '.$current.');
                    sort rating desc;
                    limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        //dd($recentlyReviewedUnformatted);

        $this->recentlyReviewed = $this->formatForView($recentlyReviewedUnformatted);
        
        collect($this->recentlyReviewed)->filter(function ($game){
            return $game['rating'];        
        })->each(function ($game){
            $this->emit('reviewGameWithRatingAdded', [
                'slug' => 'review_'.$game['slug'],                      //Change ID incase runs into issue with PopularGames slug
                'rating' => $game['rating'] / 100
            ]);           //Emit the event to fire from the main livewire component
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
    
    private function formatForView($games)
    {
        return collect($games)->map(function ($game){
            return collect($game)->merge([                                                          //Specify the fields wish to Merge for Formatting
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->implode('abbreviation', ', '),          
                'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : null,           // Works for popular games but not RecentlyReviewed, give array error.
                'summary' => array_key_exists('summary', $game) ? ($game['summary']) : 'Sorry No Summary Available!',
            ]);                                
        })->toArray();

       
    }
}
