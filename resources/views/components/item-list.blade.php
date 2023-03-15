@props([
    'name',
    'items',
    'tag' => null
])

<div>
    <div class="z-30 flex justify-between pb-2" x-data="{ showItemListOptions: false }" x-on:click.away="showItemListOptions = false">
        @if ($tag)
            <div class="relative z-20 flex justify-end w-1/3">
                <button style="none" x-on:click="showItemListOptions = !showItemListOptions" class="relative pt-2 text-gray-600 slow-hover hover:scale-110">
                    <i class="fa-solid fa-ellipsis fa-2xl"></i>
                </button>

                <div x-show="showItemListOptions" class="absolute top-0 z-20 p-4 text-center bg-gray-100 shadow-2xl right-9 rounded-2xl">
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
                        <p class="text-lg uppercase">{{ $item->abbreviated_name }}</p>
                    </div>
                    <div class="flex flex-col">
                        <h4 class="font-bold">{{ $item->name }}</h4>
                        <p class="text-xs">{{ $item->file_path }}</p>
                    </div>
                </a>

                <div class="z-10 flex flex-col">
                    <x-tag-button :item="$item" onclick="setDrawingTag" :livewire="true"/>
                    @if ($item->due_date)
                        <p class="mt-2 text-xs">Due: {{ $item->formatted_due_date }}</p>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
