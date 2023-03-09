@props([
    'name',
    'items',
    'tag' => null
])

<div>
    <div class="flex justify-between border-b-2" x-data="{ showItemListOptions: false }" x-on:click.away="showItemListOptions = false">
        <h2 class="font-bold text-gray-700">{{ $name }}</h2>

        @if ($tag)
            <div class="relative flex justify-end w-1/3">
                <button style="none" x-on:click="showItemListOptions = !showItemListOptions" class="relative pt-2 text-gray-600 slow-hover hover:scale-110">
                    <i class="fa-solid fa-ellipsis fa-2xl"></i>
                </button>

                <div x-show="showItemListOptions" class="absolute top-0 z-10 w-1/2 p-4 text-center bg-gray-100 shadow-xl left-12 rounded-2xl">
                    <button class="hover:font-bold" wire:click="hideProjectTag({{ $tag->id }})">
                        <i class="fa-regular fa-eye-slash"></i>
                        Hide
                    </button>
                </div>
            </div>
        @endif
    </div>

    <ul class="flex flex-col gap-y-2">
        @foreach($items as $item)
            <li class="flex flex-col justify-between h-full pt-2 md:flex-row">
                <div class="flex gap-x-2 md:gap-x-4">
                    <p class="leading-[1.25rem]">{{ $item->name }}</p>
                </div>

                <x-tag-button :item="$item" onclick="setDrawingTag" :livewire="true"/>
            </li>
        @endforeach
    </ul>
</div>
