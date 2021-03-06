<div class="relative" x-data="{ isVisible: true }" @click.outside="isVisible = false">              {{-- Hide the search dropdown when clicking outside the search --}}

    <input 
        wire:model.debounce.350ms="search"             {{-- Public property that gets updated with each search, hold time until search with debounce --}}
        type="text" class="bg-gray-800 text-sm rounded-full w-64 px-3 py-1" 
        placeholder="Search..."
        @focus="isVisible = true"                                    {{-- Display results again once clicked & exit with ESC with Alpine.JS --}}
        @keydown.escape.window = "isVisible = false"
        @keydown
    >

    @if (strlen($search) >= 2)
        <div class="absolute bg-gray-800 text-xs rounded w-64 mt-2" x-show="isVisible" style="z-index: 10;">
            @if (count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $game)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('games.show', $game['slug']) }}" 
                                class="hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-4 py-4"
                                @if($loop->last) @keydown.tab="isVisible = false" @endif                                            {{-- Hide once tabbed through last entry --}}
                                
                            >
                                @if (isset($game['cover']))
                                    <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}" alt="cover" class="w-8">
                                @else
                                    <img src="/images/nocover.png" class="w-8">
                                @endif
                                    
                                <span class="ml-4"> {{$game['name']}}</span>
                            </a>
                        </li>
                    @endforeach   
                </ul>
            @else    
                <div class="px-3 py-4">No results found for "{{$search}} "</div>
            @endif
        </div>
    @endif
 
</div>