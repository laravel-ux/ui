@blaze
<span
    x-cloak
    x-checkbox-indicator
    data-slot="checkbox-indicator"
    {{ $attributes->tailwindMerge(['grid place-content-center text-current transition-none']) }}
>
    {{ $slot }}
</span>
