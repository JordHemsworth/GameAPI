@extends('layouts.app')

@section('content')
    
    <div class="container mx-auto px-4">

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Popular Games </h2>

        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">                                          {{-- Create a 6 wide grid used to display all covers --}}
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/mw2.png" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64 ">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    Modern Warfare 2
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>                                                                                                                              {{-- End of one game card --}}            
        
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/doom.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    DOOM
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>    

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/bioshock.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    Bioshock Infinite
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>    

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/tombraider.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                Tomb Raider
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>    

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/farcry3.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    Far Cry 3
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>    

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/reddead.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150 w-64">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"  style="right:-20px; bottom:-20px">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            99%
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">
                    Read Dead Redemption
                </a>
                <div class="text-gray-400 mt-1 ">Xbox 360</div>
            </div>    

        </div> {{-- End of Popular Games --}}


        <div class="flex flex-col lg:flex-row my-10">
                <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                    <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Recently Reviewed</h2>
                    <div class="recently-review-container space-y-12 mt-8">
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="images/mw2.png" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"  style="right:-20px; bottom:-20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        99%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-12">
                                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                Modern Warfare 2
                                </a>
                                <div class="text-gray-400 mt-1"> Xbox 360 </div>
                                <p class="mt-6 text-gray-400 hidden lg:block">
                            What a sick game 
                                </p>
                            </div>
                        </div>
                    </div> {{-- End of first game --}}

                    <div class="recently-review-container space-y-12 mt-8">
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="images/bioshock.jpg" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"  style="right:-20px; bottom:-20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        99%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-12">
                                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                    Bioshock
                                </a>
                                <div class="text-gray-400 mt-1"> Xbox 360 </div>
                                <p class="mt-6 text-gray-400  hidden lg:block">
                                    The game is set in the year 1912 and follows its protagonist, 
                                    former Pinkerton agent Booker DeWitt, who is sent to the airborne city of Columbia to find a young woman held captive, named Elizabeth. 
                                </p>
                            </div>
                        </div>
                    </div> {{-- End of first game --}}

                    <div class="recently-review-container space-y-12 mt-8">
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="images/tombraider.jpg" alt="game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"  style="right:-20px; bottom:-20px">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        99%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-12">
                                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                                    Tomb Raider
                                </a>
                                <div class="text-gray-400 mt-1"> Xbox 360 </div>
                                <p class="mt-6 text-gray-400  hidden lg:block">
                                    Tomb Raider, also known as Lara Croft: Tomb Raider between 2001 and 2008, is a media franchise that originated with an action-adventure 
                                    video game series created by British gaming company Core Design.
                                </p>
                            </div>
                        </div>
                    </div> {{-- End of first game --}}

                </div> {{-- End of Recently Reviewed --}}

                    <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                        <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Most Anticipated</h2>
                        <div class="most-anticipated-container space-y-10 mt-8"></div>
                            <div class="game flex mb-8">
                                <a href="#">
                                    <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="ml-4">
                                    <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                    <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                </div>
                            </div>
                            <div class="game flex mb-8">
                                <a href="#">
                                    <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="ml-4">
                                    <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                    <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                </div>
                            </div>
                            <div class="game flex">
                                <a href="#">
                                    <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="ml-4">
                                    <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                    <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                </div>
                            </div>                      

                            <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-12"> Upcoming Games</h2>
                            <div class="most-anticipated-container space-y-10 mt-8"></div>
                                <div class="game flex mb-8">
                                    <a href="#">
                                        <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                    </a>
                                    <div class="ml-4">
                                        <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                        <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                    </div>
                                </div>
                                <div class="game flex mb-8">
                                    <a href="#">
                                        <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                    </a>
                                    <div class="ml-4">
                                        <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                        <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                    </div>
                                </div>
                                <div class="game flex">
                                    <a href="#">
                                        <img src="images/tombraider.jpg" alt="game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                                    </a>
                                    <div class="ml-4">
                                        <a href='#' class="hover:text-gray-300"> Womb Raider</a>
                                        <div class="text-gray-400 tx-sm mt-1"> Dec 2022 </div>
                                    </div>
                                </div>                               
                            </div> {{-- End of Upcoming --}}
                    </div>
            </div>
        </div> {{-- End of Most Anticipated --}}


    </div> {{-- End of Container --}}



@endsection