<div wire:init="load" class="most-anticipated-container space-y-10 mt-6">
    @forelse ($mostAnticipated as $game)
        <x-game-card-small :game="$game" />
    @empty
        @foreach (range(1,3) as $game)
            <x-game-card-skeleton-small />
        @endforeach
    @endforelse
</div>