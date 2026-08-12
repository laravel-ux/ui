@blaze
@props([
    'defaultValue' => null,
    'value' => null,
    'name' => null,
    'disabled' => false,
])
@php($initialValue = $value ?? $defaultValue)
<div
    x-data
    x-select
    data-value="{{ $initialValue }}"
    @if ($disabled) data-disabled @endif
    data-slot="select"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
    @if ($name)
        <input
            type="hidden"
            data-select-input
            name="{{ $name }}"
            value="{{ $initialValue }}"
            @disabled($disabled || $initialValue === null)
        />
    @endif
</div>
