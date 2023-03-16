@props(['type', 'name' => '', 'model' => '',])

<input {{ $attributes->class([
        "bg-primary-dark font-bold uppercase text-gray-100 p-4 rounded-xl",
        "ring-2 ring-red-500" => $errors->has($name),
    ])->merge([
        'placeholder' => $name,
        'id' => $name,
        'type' => $type,
        'wire:model' => $model,
    ]) }}
/>

@if ($errors->has($model))
    <p class="font-bold text-red-500">{{ $errors->first($model) }}</p>
@endif
