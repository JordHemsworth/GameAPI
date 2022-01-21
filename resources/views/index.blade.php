@extends('layouts.app')

@section('content')
    
    <div class="container mx-auto px-4">

        <h2 class="text-blue-500 uppercase tracking-wide font-semibold"> Popular Games </h2>

        <div class="popular-games text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">                                          {{-- Create a 6 wide grid used to display all covers --}}
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="images/mw2.png" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
                        <img src="images/doom.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
                        <img src="images/bioshock.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
                        <img src="images/tombraider.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
                        <img src="images/farcry3.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
                        <img src="images/reddead.jpg" alt="game cover" class="hover:opacity-75 transition ease-in-out duration-150">
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
    </div>



@endsection