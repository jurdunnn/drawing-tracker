@props([
    'item',
])
<div class="flex flex-col mt-4 gap-y-12">
    <div class="flex flex-col md:px-16">
        <h3 class="text-4xl font-bold text-gray-800">{{ $item->name }}</h3>
        <p class="max-w-lg">{{ $item->description }}</p>
    </div>

    <div class="flex flex-col overflow-y-scroll gap-y-24 no-scrollbar h-4/5 md:px-16">
        {{ $slot }}
    </div>
</div>
