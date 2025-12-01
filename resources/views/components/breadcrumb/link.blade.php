@blaze
<a
    data-slot="breadcrumb-link"
    {{ $attributes->tailwindMerge('hover:text-foreground transition-colors') }}
>
    {{ $slot }}
</a>
