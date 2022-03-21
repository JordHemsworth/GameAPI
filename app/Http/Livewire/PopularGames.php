<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function load()
    {
        
        $before = Carbon::now()->subMonths(4)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 100, function () use($before, $after) {
            
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => config('services.igdb.key'),
                'Authorization' => config('services.igdb.auth'),

            ])        
                ->withBody(                                                     /* Updated to show 12 recently released games that are popular. */
                    'fields name, cover, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;                                           
                    where platforms = (48,49,130,6)
                    & ( first_release_date >= '.$before.' 
                    & first_release_date <= '.$after.')
                    & total_rating_count > 2;
                    sort total_rating_count desc;
                    limit 12;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();

        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);       //Save to PopularGames array once the data has been formatted.

        collect($this->popularGames)->filter(function ($game){
            return $game['rating'];        
        })->each(function ($game){
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100
            ]);           //Emit the event to fire from the main livewire component
        });
        
    }

    public function render()
    {
        return view('livewire.popular-games');
        
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game){
            return collect($game)->merge([                                                          //Specify the fields wish to Merge for Formatting
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->implode('abbreviation', ', '),          
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),     
            ]);                                     
        })->toArray();

    }

  
    
}
