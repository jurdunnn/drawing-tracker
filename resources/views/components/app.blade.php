<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>

        <title>Drawing Tracker</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bebas-neue:400" rel="stylesheet" />


        <style>
            .title {
                font-family: 'Bebas Neue', 'Nunito', sans-serif;
            }

            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        @livewireStyles
    </head>
    <body class="antialiased min-h-screen bg-[#0F102B]">
        {{ $slot }}

        @livewireScripts
    </body>
</html>
