<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = "";
    public $searchResults = [];

    public function render()
    {
        if (strlen($this->search) >= 2) {

            $this->searchResults = Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
                'Client-ID' => env('IGDB_KEY'),
                'Authorization' => env('IGDB_AUTH'),
            ])        
                ->withBody(                                                       /* Updated to show recently released games that are popular. */
                    'search '."\"{$this->search}\"".';                                             
                    fields name, slug, cover.url;                                           
                    limit 6;',
                    'text/plain'
                )
                ->post('https://api.igdb.com/v4/games')->json();
        }

        return view('livewire.search-dropdown');
    }
}
