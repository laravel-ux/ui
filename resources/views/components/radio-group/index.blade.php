@blaze
@props([
    'defaultValue' => null,
    'value' => null,
    'name' => null,
    'disabled' => false,
    'orientation' => 'vertical',
])
@php($initialValue = $value ?? $defaultValue)
<div
    x-data
    x-radio-group
    role="radiogroup"
    aria-orientation="{{ $orientation }}"
    data-slot="radio-group"
    @if($disabled) data-disabled @endif
    {{ $attributes->merge(['data-value' => $initialValue])->tailwindMerge('grid w-full gap-2') }}
>
    {{ $slot }}
    @if($name)
        <input
            type="hidden"
            data-radio-group-input
            name="{{ $name }}"
            value="{{ $initialValue }}"
            @disabled($disabled || $initialValue === null)
        />
    @endif
</div>
