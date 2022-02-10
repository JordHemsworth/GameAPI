<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{

    public $mostAnticipated = [];

    public function load()
    {

        $before = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $this->mostAnticipated = Cache::remember('most-anticipated', 100, function () use ($before, $afterFourMonths) {
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])
                ->withBody(                                                     /* Get the 12 highest rated games with their name and rating */
                    'fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, summary, slug;                                           
                        where platforms = (48,49,130,6)
                        & ( first_release_date >= '.$before.' 
                        & first_release_date < '.$afterFourMonths.');
                        sort popularity desc;
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
