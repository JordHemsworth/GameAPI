<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            @if ( isset($game['cover']) )
                <img src="{{$game['coverImageUrl']}}"
                alt="Cover not found" class="w-48 h-64 hover:opacity-75 transition ease-in-out duration-150 ">
            @else
                <img src="/images/nocover.png" class="w-48">
            @endif
        </a>
            
        @if ($game['rating'])                                                               {{-- Show rating circle if a rating exists --}}
            <div id="{{$game['slug']}}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
                @push('scripts')
                    @include('_rating', [
                        'slug' => $game['slug'],
                        'rating' => $game['rating'],
                        'event' => null,
                    ])
                @endpush
            </div>
        @endif
    </div>

    <div class="space-y-4">
        <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 text-ellipsis">
            {{$game['name']}}
        </a>
        
        <div class="text-gray-400 mt-2 ">
            {{$game['platforms']}}
        </div>

    </div>
        
</div> {{-- End of one game card --}}