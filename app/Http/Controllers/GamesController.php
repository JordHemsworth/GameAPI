<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

       /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $game = Http::withHeaders([                            /* Use HTTP client with headers of API tokens from .env */
            'Client-ID' => env('IGDB_KEY'),
            'Authorization' => env('IGDB_AUTH'),
        ])  ->withBody(                                                     /* Get the game details where the slug matches the slug being passed through.*/
                'fields name, cover.url, first_release_date, platforms.abbreviation, rating, involved_companies,
                slug,genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, 
                similar_games.cover.url, similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
                where slug="'.$slug.'";                                        
                limit 1;',
                'text/plain'
                )
            ->post('https://api.igdb.com/v4/games')->json();
    
        dump($game);
        
        abort_if(!$game, 404);                                               /* If the game or url does not exist show 404 */

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);
    }

    private function formatGameForView($game)
    {
            return collect($game)->merge([
                'genres' => collect($game['genres'])->implode('name', ', '),  
                //'involvedCompanies' => $game['involved_companies'][0]['company']['name'],
                'platforms' => collect($game['platforms'])->implode('abbreviation', ', '),     
                //'memberRating' => array_key_exists('rating', $game) ? round($game['rating']) : '0',
                //'criticRating' => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) : '0',
                //'trailer' => 'https://youtube.com/embed/'.$game['videos'][0]['video_id'],

            ]); 
    }            
          
    
}     
