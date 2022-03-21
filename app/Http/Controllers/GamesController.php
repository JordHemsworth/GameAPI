<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
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
            /* 'Client-ID' => env('IGDB_KEY'),
            'Authorization' => env('IGDB_AUTH'), */
            'Client-ID' => config('services.igdb.key'),
            'Authorization' => config('services.igdb.auth'),
            
        ])  ->withBody(                                                     /* Get the game details where the slug matches the slug being passed through.*/
                'fields name, cover.url, platforms.abbreviation, rating, involved_companies, first_release_date,
                slug,genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, 
                similar_games.cover.url, similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
                where slug="'.$slug.'";                                        
                limit 1;',
                'text/plain'
                )
            ->post('https://api.igdb.com/v4/games')->json();
    
        
        
        abort_if(!$game, 404);                                               /* If the game or url does not exist show 404 */

        return view('show', [
            'game' => $this->formatGameForView($game[0]),
        ]);

    }

    private function formatGameForView($game)                       /* Removes the formatting logic from View. Check item is in array, then append or pluck specific keys */
    {
            return collect($game)->merge([
                'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : 'No Picture',
                'genres' => array_key_exists('genres', $game) ? collect($game['genres'])->implode('name', ', ') : 'Undefined Genre',   
                'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->implode('abbreviation', ', ') : 'No Platforms Available',
                'releaseDate' => array_key_exists('first_release_date', $game) ? Carbon::parse($game['first_release_date'])->format('M d, Y') : 'Unknown Release Date',     
                'memberRating' => array_key_exists('rating', $game) ? round($game['rating']) : '0',
                'criticRating' => array_key_exists('aggregated_rating', $game) ? round($game['aggregated_rating']) : '0',
                'summary' => array_key_exists('summary', $game) ? ($game['summary']) : 'Oh no! How embarrasing. We do not have a summary available for this game! Please check back soon.',
                'trailer' => array_key_exists('videos', $game) ? 'https://youtube.com/embed/'.$game['videos'][0]['video_id'] : null,
                'screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(function ($screenshot){
                    return [
                        'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                        'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                    ];
                })->take(9) : null ,
                'similarGames' => array_key_exists('similar_games', $game) ? collect($game['similar_games'])->map(function ($game){
                    return collect($game)->merge([
                        'coverImageUrl' => array_key_exists('cover', $game) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : 'No picture',
                        'rating' => isset($game['rating']) ? round($game['rating']) : null,
                        'platforms' => array_key_exists('platforms', $game) ? collect($game['platforms'])->implode('abbreviation', ', ') : null,
                    ]);                  
                })->take(6) : "No Similar Games", 

            ]); 
    }            
}     
                 