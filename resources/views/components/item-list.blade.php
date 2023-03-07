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
            <x-list-item :item="$item"></x-list-item>
        @endforeach
    </ul>
</div>
