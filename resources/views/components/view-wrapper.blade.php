<div class="bg-gray-100 shadow-2xl rounded-2xl" :class="fullscreen === 'true' ? 'absolute top-4 left-4 w-[98%] h-[98%]' : ''">
    <div class="relative flex flex-col h-full text-gray-500">
        {{ $slot }}
    </div>
</div>
