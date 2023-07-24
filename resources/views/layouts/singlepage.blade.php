
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel blog') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Other Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    
            .font-family-karla {
                font-family: karla;
            }
        </style>
    
        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    
    </head>
    <body class="bg-white font-family-karla">
        @include('layouts.navigation')

        <!-- Text Header -->
        <header class="w-full container mx-auto">
            @include('layouts.header')
        </header>

            {{$slot}}
            
        <footer class="w-full border-t bg-white pb-12">
            @include('layouts.footer')
        </footer>


    </body>
</html>

