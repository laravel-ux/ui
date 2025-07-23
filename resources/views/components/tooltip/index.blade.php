<div
    x-data="{ show: false }"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
