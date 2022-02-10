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
            'game' => $game[0],
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
