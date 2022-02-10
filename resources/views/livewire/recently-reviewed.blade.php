<div wire:init="load" class="recently-review-container space-y-12 mt-8">

    @forelse ($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{ route('games.show', $game['slug']) }}">
                    @if ( isset($game['cover']) )
                        <img src="{{ isset($game['cover']) ?  Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '#'}}"
                        alt="Cover not found" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                    @else
                        <img src="/images/nocover.png" class="w-48">
                    @endif
                    
                </a>
                @if (isset($game['rating']))
                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom:-20px">
                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                        {{round($game['rating'].'%')}}
                    </div>
                </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                    {{ $game['name']}}
                </a>

                <div class="text-gray-400 mt-1">
                    @foreach ($game['platforms'] as $platform)
                        @if (array_key_exists('abbreviation', $platform))
                            {{$platform['abbreviation']}}
                            &middot;
                        @endif
                    @endforeach </div>

                <p class="mt-6 text-gray-400 hidden lg:block">
                    @if (array_key_exists('summary', $game))
                            {{ $game['summary']}}
                            &middot;
                    @else
                        Sorry, No Summary Yet! 
                    @endif
                    
                    
                </p>
            </div>
        </div>

    @empty 
        @foreach (range(1, 3) as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none bg-gray-600 w-48 h-56"></div>            {{-- Skeleton Cover Image --}}

                <div class="ml-12">
                    <div class="bg-slate-600 w-48 h-8 mt-2 rounded"></div>              {{-- Skeleton Game Details --}}
                    <div class="bg-slate-600 w-48 h-8 mt-2 rounded"></div>

                    <div class="bg-slate-600 w-64 h-16 mt-8 rounded"></div>
                </div>
            </div>
        @endforeach
    @endforelse
</div> {{-- End of first game --}}