@props([
    'link',
    'theme' => 'primary',
    'icon' => null,
    'iconColor' => null,
    'buttonClasses' => 'ml-auto mr-auto px-4 py-3 my-2 font-bold rounded-full text-center '
])

<a {{
    $attributes->class([
        $buttonClasses,
        'text-[#23243D] bg-gray-100 md:w-1/2 w-3/4 uppercase ' => $theme === 'primary',
        'leading-[2rem]' => $icon,
        'text-gray-100 w-full' => $theme === 'secondary',
        'bg-red-600 hover:bg-red-700 text-white' => $theme === 'danger'
    ])->merge([
        'href' => $link ?? null,
    ])
}}
    >
    {{$slot}}
    <span class="{{ $iconColor }}">
        <i class="fa-solid {{ $icon }}"></i>
    </span>
</a> 
