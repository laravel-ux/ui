<a
    {{ $attributes->tailwindMerge('hover:text-foreground transition-colors') }}
    data-slot="breadcrumb-link"
>
    {{ $slot }}
</a>
