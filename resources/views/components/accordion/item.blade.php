@props(['value'])
<div
    data-slot="accordion-item"
    {{ $attributes->tailwindMerge('border-b last:border-b-0') }}
>
    {{ $slot }}
</div>
