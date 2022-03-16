<div wire:init="load" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">   {{-- Create a 6 wide grid used to display all covers --}}
    @forelse ($popularGames as $game)
        <x-game-card :game="$game" />  
    @empty
        @foreach (range(1,12) as $game)                     {{-- Load skeleton games before the API calls loads --}}
            <x-game-card-skeleton />
        @endforeach
    @endforelse

</div> {{-- End of Popular Games --}}


@push('scripts')
   @include('_rating', [
       'event' => 'gameWithRatingAdded'
   ])
@endpush