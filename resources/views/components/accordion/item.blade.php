@blaze
@props(['value'])
<div
    x-accordion-item
    data-slot="accordion-item"
    {{ $attributes->merge(['value' => $value])->tailwindMerge('border-b last:border-b-0') }}
>
    {{ $slot }}
</div>
