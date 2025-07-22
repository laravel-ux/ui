<div
    {{ $attributes->tailwindMerge('inline-flex') }}
    x-data="{ show: false }"
    data-slot="hover-card"
>
    {{ $slot }}
</div>
