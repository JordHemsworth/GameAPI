<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function load()
    {
        
        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;

        $popularGamesUnformatted = Cache::remember('popular-games', 7, function () use($before, $after) {
            
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])        
                ->withBody(                                                     /* Get the 12 highest rated games with their name and rating */
                    'fields name, cover, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, slug;                                           
                    where platforms = (48,49,130,6)
                    & ( first_release_date >= '.$before.' 
                    & first_release_date <= '.$after.');
                    sort rating desc;
                    limit 12;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();


        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);

    }

    public function render()
    {
        return view('livewire.popular-games');
        
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game){
            return collect($game)->merge([                                                          //Merge the collections to allow for Formatting the data.
                'rating' => isset($game['rating']) ? round($game['rating']).'%' : null,
                'platforms' => collect($game['platforms'])->implode('abbreviation', ', '),          

                //'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),            Getting Undefined Array Key for Cover, Unsure why.
            ]);                                     
        })->toArray();

    }

  
    
}
