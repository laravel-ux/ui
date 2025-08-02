<div
    x-data="{ __tooltipOpen: false }"
    x-modelable="__tooltipOpen"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('inline-flex') }}
>
    {{ $slot }}
</div>
