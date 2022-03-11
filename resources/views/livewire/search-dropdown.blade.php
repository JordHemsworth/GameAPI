<div class="relative">

    <input 
        wire:model.debounce.350ms="search"             {{-- Public property that gets updated with each search, hold time until search with debounce --}}
        type="text" class="bg-gray-800 text-sm rounded-full w-64 px-3 py-1" 
        placeholder="Search..."
    >

    @if (strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2">
            @if (count($searchResults) > 0)
                <ul>
                    @foreach($searchResults as $game)
                        <li class="border-b border-gray-700">
                            <a href="{{ route('games.show', $game['slug']) }}" class="hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-4 py-4">
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