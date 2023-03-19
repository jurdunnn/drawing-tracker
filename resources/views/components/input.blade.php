@props(['type', 'name' => '', 'model' => '', 'inputTag' => 'input',])

<{{ $inputTag }} {{ $attributes->class([
        "bg-primary-dark font-bold text-gray-100 p-3 rounded-lg",
        "ring-2 ring-red-500" => $errors->has($name),
    ])->merge([
        'placeholder' => $name,
        'id' => $name,
        'type' => $type,
        'wire:model' => $model,
    ]) }}
>
</{{ $inputTag }}>

@if ($errors->has($model))
    <p class="font-bold text-red-500">{{ $errors->first($model) }}</p>
@endif
