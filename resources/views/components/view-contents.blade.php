@props([
    'item',
    'closeRoute',
    'title' => null,
    'description' => null,
])

<div class="flex flex-col h-full">
    <div class="@if($item->color) bg-{{ $item->color->name }}-500 @endif bg-[#434458] rounded-t-2xl text-white">
        <div class="flex justify-end w-full px-10 pt-4 gap-x-5">
            <x-fullscreen-button />

            <x-button 
                    :link="$closeRoute"
                    icon="fa-xmark fa-2xl" 
                    buttonClasses="max-w-content hover:scale-110 slow-hover"
                    theme="none"
                >
            </x-button>
        </div>

        <div class="flex flex-col px-8 pt-2 pb-8 gap-y-4">
            <h1 class="font-bold">{{ $title ?? $item->name }}</h1>
            <h4 class="max-w-lg">{{ $description ?? $item->description }}</h4>
        </div>
    </div>

    <div class="flex flex-col max-h-[75vh] pb-32 pt-4 overflow-y-scroll no-scrollbar gap-y-12 md:px-8">
        {{ $slot }}
    </div>
</div>
