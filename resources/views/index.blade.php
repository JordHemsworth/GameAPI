@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4">

    <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Popular Games </h2>

    <div
        class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
        {{-- Create a 6 wide grid used to display all covers --}}
        @foreach ($popularGames as $game)
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
        @endforeach
    </div> {{-- End of Popular Games --}}


    <div class="flex flex-col lg:flex-row my-10">
        <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Recently Reviewed</h2>
            <div class="recently-review-container space-y-12 mt-8">

                @foreach ($recentlyReviewed as $game)
                <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                    <div class="relative flex-none">
                        <a href="/show">
                            <img src="{{ isset($game['cover']) ?  Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : '#'}}"
                                alt="game cover" alt="game cover"
                                class="w-48 hover:opacity-75 transition ease-in-out duration-150">
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
                            {{ $game['summary']}}
                        </p>
                    </div>
                </div>

                @endforeach
            </div> {{-- End of first game --}}

        </div> {{-- End of Recently Reviewed --}}

        <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Most Anticipated</h2>
            <div class="most-anticipated-container space-y-10 mt-8"></div>
            @foreach ($mostAnticipated as $game)
                <div class="game flex mb-8">
                    <a href="#">
                        <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href='#' class="hover:text-gray-300"> {{$game['name']}} </a>
                        <div class="text-gray-400 tx-sm mt-1"> {{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }} </div>
                    </div>
                </div>
            @endforeach
            

            <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-12"> Upcoming Games</h2>
            <div class="most-anticipated-container space-y-10 mt-8"></div>
            @foreach ($comingSoon as $game)
                <div class="game flex mb-8">
                    <a href="#">
                        <img src="{{Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])}}" alt="game cover"
                            class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="ml-4">
                        <a href='#' class="hover:text-gray-300"> {{$game['name']}} </a>
                        <div class="text-gray-400 tx-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }} </div>
                    </div>
                </div>
            @endforeach
            
        </div> {{-- End of Upcoming --}}
    </div>
</div>
</div> {{-- End of Most Anticipated --}}


</div> {{-- End of Container --}}



@endsection