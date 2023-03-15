@props([
    'tabs' => [],
    'disabled' => false,
])

<ul
    class="flex flex-col flex-wrap pl-0 mb-5 list-none border-b-0 md:flex-row"
    role="tablist"
    data-te-nav-ref>
    @foreach ($tabs as $index => $tab)
        <li role="presentation" class="flex-grow text-center basis-0">
            <a
                href="#tabs-{{ $tab }}"
                class="my-2 block border-x-0 border-t-0 border-b-2 border-transparent px-7 pt-4 pb-3.5 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-primary @if ($disabled) disabled @endif"
                data-te-toggle="pill"
                data-te-target="#tabs-{{ $tab }}"
                @if ($index == 0)
                    data-te-nav-active
                @endif
                role="tab"
                aria-controls="tabs-{{ $tab }}"
                aria-selected="true"
                >{{ $tab }}</a
            >
        </li>
    @endforeach
</ul>
<div class="mb-6">
    {{ $slot }}
</div>
