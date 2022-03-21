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
                'Client-ID' => config('services.igdb.Client-ID'),
                'Authorization' => config('services.igdb.Authorization'),

            ])
                ->withBody(                                                     /* Get 3 games that are releasing within 4 months */
                    'fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, summary, slug;                                           
                        where platforms = (48,49,130,6)
                        & ( first_release_date >= '.$now.' 
                        & first_release_date < '.$afterFourMonths.');
                        limit 3;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        });

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);

       // ddd($this->mostAnticipated);

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
