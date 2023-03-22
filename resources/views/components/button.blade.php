@props([
    'link',
    'theme' => 'primary',
    'onclick' => '',
    'icon' => null,
    'iconColor' => null,
    'iconType' => 'solid',
    'type' => null,
    'buttonClasses' => 'ml-auto select-none mr-auto px-4 py-3 my-2 hover:scale-110 slow-hover font-bold rounded-lg cursor-pointer text-center',
    'buttonColor' => '',
    'buttonTag' => 'a',
    'tooltip' => null,
    'wire' => null,
    'xclick' => null
])

<{{ $buttonTag }} {{
    $attributes->class([
        $buttonClasses,
        $buttonColor,
        'md:w-1/2 w-3/4 uppercase' => $theme === 'primary',
        'leading-[2rem]' => $icon,
        'text-gray-100 w-full' => $theme === 'secondary',
        '' => $theme === 'none',
        'bg-red-600 hover:bg-red-700 text-white' => $theme === 'danger'
    ])->merge([
        'href' => $link ?? null,
        'type' => $type,
        'wire:click' => $wire,
        'onclick' => $onclick,
        'data-tippy-content' => $tooltip,
        'x-on:click' => $xclick,
    ])
}}
    >
    <span class="{{ $iconColor }}">
        <i class="fa-{{ $iconType }} {{ $icon }}"></i>
    </span>
    {{$slot}}
</{{ $buttonTag }}> 
