@props(['color', 'tooltip', 'link', 'icon'])
<a 
    x-show="showProjectOptions"
    x-cloak
    @if (isset($tooltip))
        data-tippy-content="{{ $tooltip }}"
    @endif
        x-transition.duration.200ms
        href="{{ $link }}" 
        class="flex flex-col cursor-pointer max-w-content gap-y-2 slow-hover hover:scale-105"
        >
        <div class="flex items-center justify-center w-12 h-12 ml-auto my-auto mr-auto font-bold text-white bg-{{ $color }}-500 shadow-2xl rounded-2xl">
            <span class="pt-1">
                <i class="fa-solid fa-{{ $icon }}"></i>
            </span>
        </div>
</a>
