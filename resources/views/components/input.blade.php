@props([
    'type',
    'name' => '',
    'model' => null,
    'inputTag' => 'input',
    'placeholder' => '',
    'label' => null,
    'inputClasses' => 'px-0 bg-gray-100 font-bold text-gray-700 border-0 border-b-2 focus:border-transparent focus:border-b-gray-400 focus:ring-0 border-b-gray-300'
])

@if ($label)
    <label for="{{ $name }}">{{ $label }}</label>
@endif

<{{ $inputTag }} {{ $attributes->class([
        $inputClasses,
        "ring-2 ring-red-500" => $errors->has($name),
    ])->merge([
        'placeholder' => $placeholder,
        'id' => $name,
        'name' => $name,
        'type' => $type,
        'wire:model' => $model,
    ]) }}
>
</{{ $inputTag }}>

@if ($errors->has($model ?? $name))
    <p class="font-bold text-red-500">{{ $errors->first($model ?? $name) }}</p>
@endif
