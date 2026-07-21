@blaze
<ol
    data-slot="breadcrumb-list"
    {{ $attributes->tailwindMerge('text-muted-foreground flex flex-wrap items-center gap-1.5 text-sm wrap-break-word') }}
>
    {{ $slot }}
</ol>
