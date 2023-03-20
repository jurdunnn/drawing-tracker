@props(['closeButton'])

<div class="absolute top-0 left-0 z-10 flex justify-center w-full h-full bg-gray-800 bg-opacity-80">
    <div class="relative w-full h-full p-8 m-4 bg-white rounded-lg shadow-2xl md:mt-12 md:m-0 md:w-1/2 md:h-1/3">
        <a x-on:click="{{ $closeButton }}" class="absolute flex items-center justify-center w-8 h-8 text-white rounded-full cursor-pointer slow-hover hover:text-red-500 hover:scale-110 -top-3 -right-3 bg-primary-dark">
            <i class="fa-solid fa-xmark"></i>
        </a>

        <div>
            {{ $slot }}
        </div>
    </div>
</div>
