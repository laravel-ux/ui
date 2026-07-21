@blaze
<span
    x-cloak
    x-checkbox-indicator
    data-slot="checkbox-indicator"
    {{ $attributes->tailwindMerge('grid place-content-center text-current transition-none [&>svg]:size-3.5') }}
>
    {{ $slot }}
</span>
