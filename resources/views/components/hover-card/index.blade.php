<div
    {{ $attributes->tailwindMerge('flex') }}
    x-data="{ show: false }"
    data-slot="hover-card"
>
    {{ $slot }}
</div>
