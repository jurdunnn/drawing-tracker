@props([
    'name',
    'items',
    'tag' => null
])

<div>
    <div class="flex justify-between border-b-2" x-data="{ showItemListOptions: false }" x-on:click.away="showItemListOptions = false">
        <h3 class="text-2xl font-bold text-gray-700">{{ $name }}</h3>

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

    <ul class="flex flex-col gap-y-8">
        @foreach($items as $item)
            <li class="flex flex-col justify-between h-full pt-2 md:flex-row">
                <div class="flex gap-x-2 md:gap-x-4">
                    <!-- Check box -->
                    <div class="flex w-8 h-8 px-4 text-3xl font-bold bg-{{ $item->project->color->name }}-500 rounded-full shadow-2xl cursor-pointer slow-hover hover:scale-110 hover:bg-{{ $item->project->color->name }}-600">
                        <span class="-ml-2 text-[1rem] text-white">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    </div>

                    <!-- Drawing Description -->
                    <p class="leading-[2rem]">{{ $item->name }}</p>
                </div>

                <x-tag-button :item="$item" onclick="setDrawingTag" :livewire="true"/>
            </li>
        @endforeach
    </ul>
</div>
