<div
    {{ $attributes->tailwindMerge('inline-flex') }}
    x-data="{ show: false }"
    data-slot="popover"
>
    {{ $slot }}
</div>
