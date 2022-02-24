<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ComingSoon extends Component
{

    public $comingSoon = [];

    public function load()
    {
        $now = Carbon::now()->addWeeks(1)->timestamp;
        
        
        $this->comingSoon = Cache::remember('coming-soon', 5, function () use ($now, ) {
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])
                ->withBody(                                                     /* Get 3 games that are close to release. */
                    'fields name, cover.url, rating, first_release_date, slug ;                                           
                        where platforms = (48,49,130,6)
                        & first_release_date > '.$now.';  
                        sort first_release_date asc;
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

       // dd($this->comingSoon);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
