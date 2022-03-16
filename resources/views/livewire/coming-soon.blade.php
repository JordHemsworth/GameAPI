<div wire:init="load" class="most-anticipated-container space-y-10 mt-8">
    @forelse ($comingSoon as $game)
        <x-game-card-small :game="$game" />                         {{-- Display small game card with game details else show the skeleton.--}}
    @empty
        @foreach (range(1,3) as $game)
           <x-game-card-skeleton-small />
        @endforeach

    @endforelse
</div>