<div
    x-data="{ show: false }"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('inline-flex') }}
>
    {{ $slot }}
</div>
