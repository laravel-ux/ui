<div
    x-data
    x-hover-card
    data-slot="hover-card"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
