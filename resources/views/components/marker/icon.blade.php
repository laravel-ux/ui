@blaze
<span
    aria-hidden="true"
    data-slot="marker-icon"
    {{ $attributes->tailwindMerge("size-4 [&_svg:not([class*='size-'])]:size-4") }}
>
    {{ $slot }}
</span>
