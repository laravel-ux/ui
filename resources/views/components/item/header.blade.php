<div
    data-slot="item-header"
    {{ $attributes->tailwindMerge('flex basis-full items-center justify-between gap-2') }}
>
    {{ $slot }}
</div>
