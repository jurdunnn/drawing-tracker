@props(['item', 'onclick' => '#', 'livewire' => false,])

<div class="relative z-10 w-32" x-data="{showTagDropdown: false}" x-on:click.away="showTagDropdown = false" x-cloak>
    <button 
        x-on:click="showTagDropdown = !showTagDropdown"
        class="flex items-center w-32 font-bold text-center text-white bg-{{ $item->tag->color->name }}-500 opacity-[0.6] rounded-full cursor-pointer slow-hover hover:scale-105"
    >
        <p class="w-32">{{ $item->tag->name }}</p>
    </button>

    <div x-show="showTagDropdown">
        <div class="absolute top-0 min-w-full min-h-full -left-36">
            <ul class="flex flex-col gap-y-2">
                @foreach ($item->tag->getAvailableTags() as $tag)
                    <li 
                        class="flex items-center w-32 font-bold text-center text-white bg-{{ $tag->color->name }}-500 rounded-full cursor-pointer slow-hover hover:scale-105"
                        @if ($livewire)
                            wire:click="{{ $onclick }}({{$item->id}}, {{$tag->id}})"
                        @else
                            onclick="{{ $onclick }}({{$item->id}}, {{$tag->id}}"
                        @endif 
                    >
                        <p class="mx-auto">{{ $tag->name }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> 
