<div wire:init="load" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">   {{-- Create a 6 wide grid used to display all covers --}}
    @forelse ($popularGames as $game)
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
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{$game['rating']}}
                        </div>
                    </div>
                @endif
            </div>

            <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8 max-h-5 text-ellipsis">
                {{$game['name']}}
            </a>

            <div class="text-gray-400 mt-1 ">
                {{$game['platforms']}}
            </div>
        </div> {{-- End of one game card --}}
        
    @empty
        @foreach (range(1,12) as $game) {{-- Load skeleton games before the API loads in --}}
            <div class="game mt-8">
                <div class="bg-gray-600 w-48 h-56 "></div>
                <div class="bg-slate-600 w-48 h-8 mt-2 rounded"></div>
                <div class="bg-slate-600 w-48 h-8 mt-2 rounded"></div>
            </div>
        @endforeach
    @endforelse

</div> {{-- End of Popular Games --}}