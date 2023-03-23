@props(['closeButton'])

<div class="absolute top-0 left-0 z-10 flex justify-center w-screen h-screen bg-gray-800 bg-opacity-80">
    <div class="relative max-h-[90vh] p-6 mx-12 bg-white rounded-lg shadow-2xl my-auto">
        <a x-on:click="{{ $closeButton }}" class="absolute flex items-center justify-center w-8 h-8 text-white rounded-full cursor-pointer slow-hover hover:text-red-500 hover:scale-110 -top-3 -right-3 bg-primary-dark">
            <i class="fa-solid fa-xmark"></i>
        </a>

        {{ $slot }}
    </div>
</div>
