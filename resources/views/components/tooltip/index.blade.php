@blaze
<div
    x-data
    x-tooltip
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
