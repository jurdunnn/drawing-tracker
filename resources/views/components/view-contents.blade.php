@props([
    'item',
    'closeRoute',
])

<div class="flex flex-col">
    <div class="bg-{{ $item->color->name }}-500 rounded-t-2xl text-white">
        <div class="flex justify-end w-full px-10 py-4">
            <x-button 
                    :link="$closeRoute" 
                    icon="fa-xmark fa-2xl" 
                    buttonClasses="max-w-content text-sm hover:scale-110 slow-hover"
                    theme="none"
                >
            </x-button>
        </div>

        <div class="flex flex-col px-8 pt-2 pb-8 gap-y-4">
            <h3 class="text-4xl font-bold">{{ $item->name }}</h3>
            <p class="max-w-lg">{{ $item->description }}</p>
        </div>
    </div>

    <div class="flex flex-col mt-6 max-h-[75vh] no-scrollbar overflow-y-scroll gap-y-12 md:px-16">
        {{ $slot }}
    </div>
</div>
