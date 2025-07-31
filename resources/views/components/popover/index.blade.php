<div
    x-data="{ open: false }"
    x-modelable="open"
    data-slot="popover"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
