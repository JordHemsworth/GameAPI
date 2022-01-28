<div wire:init="load" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">   {{-- Create a 6 wide grid used to display all covers --}}
    @forelse ($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="/show">
                    <img src="{{ isset($game['cover']) ?  Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '#'}}"
                        alt="game cover" {{-- If the game has a cover, fix the size to 'cover_big' and get URL. --}}
                        class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                </a>
                @if (isset($game['rating']))
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                        style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{round($game['rating'].'%')}}
                        </div>
                    </div>
                @endif
            </div>
            <a href="/show" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                {{$game['name']}}
            </a>

            <div class="text-gray-400 mt-1 ">
                @foreach ($game['platforms'] as $platform)
                @if (array_key_exists('abbreviation', $platform))
                {{$platform['abbreviation']}}
                &middot;
                @endif

                @endforeach
            </div>
            
        </div> {{-- End of one game card --}}
    @empty
        
        <svg class="animate-spin mt-8 h-8 w-8 text-white" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    
    @endforelse
</div> {{-- End of Popular Games --}}