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
            <li class="flex flex-col justify-between h-full px-4 py-2 hover:scale-[101%] hover:bg-gray-200 rounded-md md:flex-row">
                <a href="{{ $item->showRoute() }}" class="flex cursor-pointer gap-x-4">
                    <div class="flex text-white select-none font-bold items-center justify-center w-10 h-10 bg-{{ $item->project->color->name }}-500 rounded-full">
                        <p class="text-lg">{{ $item->abbreviated_name }}</p>
                    </div>
                    <div class="flex flex-col">
                        <h4 class="font-bold">{{ $item->name }}</h4>
                        <p class="text-xs">{{ $item->file_path }}</p>
                    </div>
                </a>

                <div class="flex flex-col">
                    <x-tag-button :item="$item" onclick="setDrawingTag" :livewire="true"/>
                    @if ($item->due_date)
                        <p class="mt-2 text-xs">Due: {{ $item->due_date }}</p>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
