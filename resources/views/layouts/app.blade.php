<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> IGDB Application </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-900 text-white">

    <header class="border-b border-gray-800">
        <nav class="contain mx-auto flex flex-col lg:flex-row items-center justify-between ">
            <div class="flex flex-col lg:flex-row items-centre">
                <a href="/">
                    <img src="/images/IGDB.png" alt="logo" class="w-32 flex-none ml-12 ">
                </a>

                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-10">
                    <li><a href="/" class="hover:text-gray-400"> Games </a></li>
                    <li><a href="http://35.173.49.241/#recentlyReleased" class="hover:text-gray-400"> Recently Released </a></li>     
                    <li><a href="http://35.173.49.241/#comingSoon" class="hover:text-gray-400"> Coming Soon </a></li>                 
                </ul>
            </div>

            <div class="flex items-center mt-6 lg:mt-0 mr-12">
                <livewire:search-dropdown>
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

    <script src="/js/app.js"></script>
    @stack('scripts')

</body>

</html>