<div
    x-data
    x-popover
    data-slot="popover"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
