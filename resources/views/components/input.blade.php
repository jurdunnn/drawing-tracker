@props(['type', 'name' => '',])

<input {{ $attributes->class([
        "bg-[#434458] font-bold uppercase text-gray-100 p-4 rounded-xl",
        "ring-2 ring-red-500" => $errors->has($name),
    ])->merge([
        'placeholder' => $name,
        'id' => $name,
        'type' => $type,
    ]) }}
/>

@if ($errors->has($name))
    <p class="font-bold text-red-500">{{ $errors->first($name) }}</p>
@endif
