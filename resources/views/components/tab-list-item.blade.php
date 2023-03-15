@props(['tab' => '', 'active' => false])
<div
    class="hidden opacity-0 opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
    id="tabs-{{ $tab }}"
    role="tabpanel"
    aria-labelledby="tabs-{{ $tab }}"
    @if($active)
        data-te-tab-active
    @endif
    >
    {{ $slot }}
</div>
