<div
    x-data="{ open: false }"
    x-modelable="open"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('inline-flex') }}
>
    {{ $slot }}
</div>
