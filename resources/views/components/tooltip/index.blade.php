<div
    x-tooltip
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
