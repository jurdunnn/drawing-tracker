@props([
    'item',
])
<div class="flex flex-col px-2 mt-4 md:px-12 gap-y-24">
    <div class="flex flex-col gap-y-3">
        <h3 class="text-4xl font-bold text-gray-800">{{ $item->name }}</h3>
        <p class="max-w-lg">{{ $item->description }}</p>
    </div>

    <div class="flex flex-col gap-y-4">
        {{ $slot }}
    </div>
</div>
