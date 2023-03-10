@props([
    'buttons' => [], 
    'color' => 'gray-700',
    'icon' => 'gears',
    'class' => '',
])

<div 
    @class([
        'absolute flex bottom-4 gap-6 right-4',
        $class,
    ])
    x-data="{ showProjectOptions: false }" 
    x-on:click.away="showProjectOptions = false"
>
    @foreach ($buttons as $button)
        <a 
            x-show="showProjectOptions"
            x-cloak
            @if (isset($button['tooltip']))
                data-tippy-content="{{ $button['tooltip'] }}"
            @endif
            x-transition.duration.200ms
            href="{{ $button['link'] }}" 
            class="flex flex-col cursor-pointer max-w-content gap-y-2 slow-hover hover:scale-105"
        >
            <div class="flex items-center justify-center w-12 h-12 ml-auto my-auto mr-auto font-bold text-white bg-{{ $button['buttonColor'] }} shadow-2xl rounded-2xl">
            <span class="pt-1">
                    <i class="fa-solid fa-{{ $button['icon'] }}"></i>
                </span>
            </div>
        </a>
    @endforeach

    <a 
        x-on:click="showProjectOptions = !showProjectOptions"
        class="flex flex-col mx-2 cursor-pointer max-w-content gap-y-2 slow-hover hover:scale-105"
    >
        <div class="flex items-center justify-center w-16 h-16 ml-auto mr-auto text-3xl font-bold text-white bg-{{ $color }} shadow-2xl rounded-2xl">
        <span class="pt-2">
                <i class="fa-solid fa-{{ $icon }}"></i>
            </span>
        </div>
    </a>
</div>
