<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{

    public $comingSoon = [];

    public function load()
    {
        $now = Carbon::now()->timestamp;
        $oneMonth = Carbon::now()->addMonth(1)->timestamp;
        
        $comingSoonUnformatted = Cache::remember('coming-soon', 100, function () use ($now, $oneMonth) {
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                /* 'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'), */
                'Client-ID' => 'p1dl8jccjvicjme7tpvvjb6zoq8ir7',
                'Authorization' => 'Bearer yub0jefu4yd91f6wjcq2h09194ofv9'
                

            ])
                ->withBody(                                                     /* Get 3 games that are close to release. */
                    'fields name, cover.url, rating, first_release_date, slug ;                                           
                        where platforms = (48,49,130,6)
                        & (first_release_date > '.$now.'
                        & first_release_date <= '.$oneMonth.');  
                        sort rating asc;                                      
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

       // dd($this->comingSoon);

       $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y'),
                'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : 'No picture',
            ]);
        })->toArray();
    }
}
