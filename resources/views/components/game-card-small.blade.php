<div class="game flex">
    <a href="{{ route('games.show', $game['slug']) }}">
        @if (isset($game['cover']))
            <img src="{{$game['coverImageUrl']}}" class="w-16 h-20 hover:opacity-75 transition ease-in-out duration-150">
        @else
            <img src="/images/nocover.png" class="w-16">
        @endif 
    </a>

    <div class="ml-4">
        <a href="{{ route('games.show', $game['slug']) }}" class="hover:text-gray-300 flex-1" > 
            {{$game['name']}} 
        </a>
        @if( isset($game['cover']))
            <div class="text-gray-400 tx-sm mt-1">
                {{$game['releaseDate']}} 
            </div>
        @endif
        
    </div>
</div>