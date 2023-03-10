@props([
    'link',
    'theme' => 'primary',
    'onclick' => '',
    'icon' => null,
    'iconColor' => null,
    'iconType' => 'solid',
    'type' => null,
    'buttonClasses' => 'ml-auto mr-auto px-4 py-3 my-2 font-bold rounded-full text-center',
    'buttonTag' => 'a'
])

<{{ $buttonTag }} {{
    $attributes->class([
        $buttonClasses,
        'text-[#23243D] bg-gray-100 md:w-1/2 w-3/4 uppercase ' => $theme === 'primary',
        'leading-[2rem]' => $icon,
        'text-gray-100 w-full' => $theme === 'secondary',
        '' => $theme === 'none',
        'bg-red-600 hover:bg-red-700 text-white' => $theme === 'danger'
    ])->merge([
        'href' => $link ?? null,
        'type' => $type,
        'onclick' => $onclick,
    ])
}}
    >
    <span class="{{ $iconColor }}">
        <i class="fa-{{ $iconType }} {{ $icon }}"></i>
    </span>
    {{$slot}}
</{{ $buttonTag }}> 
