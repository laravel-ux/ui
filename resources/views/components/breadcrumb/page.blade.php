<span
    {{ $attributes->tailwindMerge('text-foreground font-normal') }}
    role="link"
    aria-disabled="true"
    aria-current="page"
    data-slot="breadcrumb-page"
>
    {{ $slot }}
</span>
