@props([
    'items' => [],
])
<div class="flex flex-row flex-wrap justify-between w-full py-2 gap-x-4">
    <button 
        class="px-4 py-3 my-2 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-110 slow-hover rounded-xl hover:bg-gray-500 hover:text-white"
        :class="activeTab == 'All Drawings' ? 'bg-gray-500 text-white' : ''"
        x-on:click="activeTab = 'All Drawings'"
        >
        All Drawings
    </button>

    @foreach ($items as $item)
        <button 
            class="px-4 py-3 my-2 ml-auto mr-auto font-bold text-center cursor-pointer hover:scale-110 slow-hover rounded-xl hover:bg-{{ $item->color->name }}-500 hover:text-white"
            :class="activeTab == '{{ $item->name }}' ? 'bg-{{ $item->color->name }}-500 text-white' : ''"
            x-on:click="activeTab = '{{ $item->name }}'"
            >
            {{ $item->name }}
        </button>
    @endforeach
</div>
