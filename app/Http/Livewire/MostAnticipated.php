<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipated extends Component
{

    public $mostAnticipated = [];

    public function load()
    {

        $now = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Cache::remember('most-anticipated', 100, function () use ($now, $afterFourMonths) {
            return Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                /* 'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'), */
                'Client-ID' => 'p1dl8jccjvicjme7tpvvjb6zoq8ir7',
                'Authorization' => 'Bearer yub0jefu4yd91f6wjcq2h09194ofv9'
                
            ])
                ->withBody(                                                     /* Get the 12 highest rated games with their name and rating */
                    'fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, summary, slug;                                           
                        where platforms = (48,49,130,6)
                        & ( first_release_date >= '.$now.' 
                        & first_release_date < '.$afterFourMonths.');
                        sort popularity desc;
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);

    }

    public function render()
    {
        return view('livewire.most-anticipated');
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
