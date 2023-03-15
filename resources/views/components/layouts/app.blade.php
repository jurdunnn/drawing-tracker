<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Drawer</title>

        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

        <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bebas-neue:400" rel="stylesheet" />

        @livewireStyles
    </head>
    <body class="antialiased min-h-screen bg-[#0F102B]" x-data="globalData()">
        {{ $slot }}

        <script src="https://unpkg.com/popper.js@1"></script>
        <script src="https://unpkg.com/tippy.js@5"></script>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    </body>

    <script>
        const globalData = () => {
            return {
                'fullscreen': 'false',
                init() {
                    if (window.location.pathname === '/projects') {
                        localStorage.fullscreen = 'false';
                    } 

                    this.fullscreen = localStorage.fullscreen ?? false;

                    this.$watch('fullscreen', (val) => localStorage.fullscreen = val);

                    tippy('[data-tippy-content]');
                },
            }
        }
    </script>
</html>
