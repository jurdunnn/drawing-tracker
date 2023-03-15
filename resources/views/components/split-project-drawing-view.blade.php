<div 
    class="w-full max-h-[100vh] h-screen p-4 grid gap-4" 
    :class="fullscreen == 'true' ? 'grid-cols-1 md:grid-cols-1' : 'grid-cols-1 md:grid-cols-2'" 
    wire:poll.500ms
    x-cloak
    >
    {{ $slot }}
</div>
