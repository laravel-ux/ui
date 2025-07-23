<div
    {{ $attributes->tailwindMerge('flex') }}
    x-data="{ show: false }"
    data-slot="popover"
>
    {{ $slot }}
</div>
