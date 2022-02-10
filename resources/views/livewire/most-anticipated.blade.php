<div wire:init="load" class="most-anticipated-container space-y-10 mt-6">
    @forelse ($mostAnticipated as $game)
        <div class="game flex">
            <a href="#">
                @if ( isset($game['cover']) )
                        <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}"
                        alt="Cover not found" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    @else
                        <img src="/images/nocover.png" class="w-16">
                    @endif
            </a>
            <div class="ml-4">
                <a href="{{ route('games.show', $game['slug']) }}" class="hover:text-gray-300 flex-1" > 
                    {{$game['name']}} 
                </a>
                <div class="text-gray-400 tx-sm mt-1"> {{
                    Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }} 
                </div>
            </div>
        </div>
    @empty
        @foreach (range(1,3) as $game)
            <div class="game flex mb-8">
                <div class="bg-gray-600 w-16 h-24 flex-none"></div>
                <div class="ml-4">
                    <div class="bg-slate-600 w-32 h-8 mt-2 rounded"></div>              {{-- Skeleton Game Details --}}
                    <div class="bg-slate-600 w-32 h-8 mt-2 rounded"></div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>