<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{

    public $comingSoon = [];

    public function load()
    {
        $this->comingSoon = Cache::remember('coming-soon', 100, function () {
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])
                ->withBody(                                                     /* Get the 12 highest rated games with their name and rating */
                    'fields name, cover.url, rating, first_release_date ;                                           
                        where rating != null;
                        sort rating desc;
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
