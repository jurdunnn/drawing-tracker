@props([
    'items' => [],
])
<div class="flex flex-row flex-wrap justify-between w-full py-2 gap-x-4">
        <x-button theme="none" buttonColor="hover:bg-gray-500 hover:text-white">All</x-button>
    @foreach ($items as $item)
        <x-button theme="none" buttonColor="hover:bg-{{ $item->color->name }}-500 hover:text-white">{{ $item->name }}</x-button>
    @endforeach
</div>
