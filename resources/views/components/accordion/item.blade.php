@props([
    'value',
])
<div
    {{ $attributes->tailwindMerge('border-b last:border-b-0') }}
    data-slot="accordion-item"
>
    {{ $slot }}
</div>
