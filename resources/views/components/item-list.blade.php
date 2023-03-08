@props([
    'name',
    'items',
])

<div>
    <div class="flex justify-between pb-6 border-b-2">
        <h3 class="text-2xl font-bold text-gray-700">{{ $name }}</h3>
        <span class="pt-2 text-gray-600">
            <i class="fa-solid fa-ellipsis fa-2xl"></i>
        </span>
    </div>

    <ul class="flex flex-col gap-y-8">
        @foreach($items as $item)
            <li class="flex flex-col justify-between pt-2 md:flex-row">
                <div class="flex gap-x-2 md:gap-x-4">
                    <!-- Check box -->
                    <div class="flex w-8 h-8 px-4 text-3xl font-bold bg-{{ $item->project->color->name }}-500 rounded-full shadow-2xl cursor-pointer hover:scale-110 hover:bg-{{ $item->project->color->name }}-600">
                        <span class="-ml-2 text-[1rem] text-white">
                            <i class="fa-solid fa-check"></i>
                        </span>
                    </div>

                    <!-- Drawing Description -->
                    <p class="leading-[2rem]">{{ $item->name }}</p>
                </div>

                <x-tag-button :item="$item" onclick="setDrawingTag" :livewire="true"/>
            </li>
        @endforeach
    </ul>
</div>
