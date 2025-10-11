<div
    x-data="{ __popoverOpen: false }"
    x-modelable="__popoverOpen"
    data-slot="popover"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
