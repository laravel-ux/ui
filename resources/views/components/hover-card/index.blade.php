<div
    x-data="{ open: false }"
    x-modelable="open"
    data-slot="hover-card"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
