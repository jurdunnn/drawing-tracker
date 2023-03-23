<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Drawer</title>

        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>

        <link href="{{ asset('fontawesome/css/fontawesome.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome/css/brands.css') }}" rel="stylesheet">
        <link href="{{ asset('fontawesome/css/solid.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=bebas-neue:400" rel="stylesheet" />

        @livewireStyles
    </head>
    <body class="min-h-screen antialiased bg-primary-main" x-data="globalData()">
        <template x-if="imageModal != 'hidden'" wire:ignore>
            <div class="fixed top-0 left-0 z-50 w-screen h-screen">
                <x-modal closeButton="imageModal = 'hidden'" wire:ignore>
                    <div class="flex justify-center w-full h-full">
                        <img class="my-auto" :src="imageModal" />
                    </div>
                </x-modal>
            </div>
        </template>

        {{ $slot }}

        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        @livewireScripts
    </body>

    <script>
        const globalData = () => {
            return {
                'fullscreen': 'false',
                'imageModal': 'hidden',
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
