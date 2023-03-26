@props([
    'color' => 'gray',
    'icon' => 'gears',
    'class' => '',
])

<div 
    @class([
        'absolute flex flex-col sm:flex-row bottom-4 gap-6 right-4',
        $class,
    ])
    x-data="{ showProjectOptions: false }" 
    x-on:click.away="showProjectOptions = false"
>

{{ $slot }}

    <a 
        x-on:click="showProjectOptions = !showProjectOptions"
        data-tippy-content="Toolbelt"
        class="flex flex-col mx-2 cursor-pointer max-w-content gap-y-2 slow-hover hover:scale-105"
    >
        <div class="flex items-center justify-center w-16 h-16 ml-auto mr-auto text-3xl font-bold text-white bg-{{ $color }}-500 shadow-2xl rounded-2xl">
        <span class="pt-2">
                <i class="fa-solid fa-{{ $icon }}"></i>
            </span>
        </div>
    </a>
</div>
