<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        

        @livewireStyles
    </head>

    <body class="bg-gray-900 text-white">
        
        <header class="border-b border-gray-800">
            <nav class="contain mx-auto flex flex-col lg:flex-row items-center justify-between px-4 py-y">
                <div class="flex flex-col lg:flex-row items-centre mt-2 mb-5">
                    <a href="/">
                        <img src="/images/ubisoft.png" alt="logo" class="w-32 flex-none ml-14 mt-2">
                    </a>

                    <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-10">
                        <li><a href="#" class="hover:text-gray-400"> Games </a></li>
                        <li><a href="#" class="hover:text-gray-400"> Reviews </a></li>
                        <li><a href="#" class="hover:text-gray-400"> Coming Soon </a></li>
                    </ul>
                </div>

                <div class="flex items-center mt-6 lg:mt-0">
                    <div class="relative">
                        <input type="text" class="bg-gray-800 text-sm rounded-full w-64 px-3 py-1" placeholder="Search...">
                        {{-- TODO add search icon svg --}}

                    </div>

                    <div class="ml-6">
                        <a href="#"><img src="/avatar.jpg" alt="avatar" class="rounded-full w-8">
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="py-8">
            @yield('content')
        </main>


        <footer class="border-t border-gray-800">
            <div class="container mx-auto px-4 py-6">
                Powered By <a href="#" class="underline hover:text-gray-400"> IGDB API</a>
            </div>
        </footer>

        @livewireScripts
    </body>

</html>