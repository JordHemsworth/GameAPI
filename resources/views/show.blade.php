@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">
    <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
        <div class="flex-none">

            @if (isset($game['cover']))
                <img src="{{$game['coverImageUrl']}}" class="w-64 hover:opacity-75 transition ease-in-out duration-150">
            @else
                <img src="/images/nocover.png" class="w-48">
            @endif 
        </div>
        
        <div class="lg:ml-12 lg:mr-64">
            <h2 class="font-semibold text-4xl leading-tight mt-2"> {{ $game['name'] }} </h2>
            <div class="text-gray-400">
                <span>                    
                        {{$game['genres']}}
                </span>
                    &middot;     {{-- Separate genres and platforms with mid dot. --}}                   
                <span>                  
                        {{$game['platforms']}}
                </span>

                {{--  <span> {{ $game['involved_companies'][0]['company']['name']}} </span>  Offset Array Error --}}
            </div>

            <div class="flex flex-wrap items-center mt-8 ">
                <div class="flex items-center">
                    <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                        @push('scripts')
                           @include('_rating', [
                               'slug' => 'memberRating',
                               'rating' => $game['memberRating'],
                               'event' => null,
                           ])
                        @endpush
                    </div>
                    <div class="ml-4 text-xs"> Member <br> Score </div>
                </div>

                <div class="flex items-center ml-6 mr-12">
                    <div id ="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                        @push('scripts')
                            @include('_rating', [
                                'slug' => 'criticRating',
                                'rating' => $game['criticRating'],
                                'event' => null,
                            ])
                        @endpush
                    </div>
                    <div class="ml-4 text-xs"> Critic <br> Score </div>
                </div> 
      
                <p class="mt-12">         
                        {{ $game['summary'] }}
                </p>

                <div class="mt-12"> 
                    @if ($game['trailer'])
                        <a href="{{$game['trailer']}}" class="bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-700 rounded">
                            <span class="ml-4"> Play Trailer </span>
                            <a href="" class="hover:text-gray-400">
                                <svg class="w-6 fill-current ml-2 relative " viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 
                                        10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                                    </path>
                                </svg>
                            </a>
                        </a>
                    @else
                        <p>No Trailer Yet</p>
                    @endif                 
                </div>
            </div>
        </div>
    </div> {{-- End game details --}}

    <div class="images-container border-b border-gray-800 pb-12 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8"> 
                @if($game['screenshots'])
                    @foreach ($game['screenshots'] as $screenshot)                      {{-- Display screenshots, show larger picture when clicked --}}
                            <div>
                                <a href="{{ $screenshot['huge']}}">
                                    <img src="{{ $screenshot['big']}}">
                                </a>
                            </div>
                    @endforeach       
                @else
                    <p> Sorry! No Screenshots Available. </p>
                @endif
            </div>
    </div> {{-- End images container --}}
    
    <div class="similar-games-container border-b border-gray-800 pb-6 mt-8">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Similar Games </h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-12"> {{-- Create a 6 wide grid used to display all covers --}} 
                @if ( isset($game['similar_games']))
                    @foreach ($game['similarGames'] as $game)
                        <x-game-card :game="$game" />                   
                    @endforeach
                @else   
                    <p> No Similar Games Available</p>
                @endif
    </div> {{-- End similar games --}}
</div>

@endsection