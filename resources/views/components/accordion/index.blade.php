@blaze
@props(['value' => null])
<div
    x-data
    x-accordion
    data-slot="accordion"
    {{ $attributes->merge(['data-value' => $value]) }}
>
    {{ $slot }}
</div>
