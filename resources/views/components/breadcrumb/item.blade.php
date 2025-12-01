@blaze
<li
    data-slot="breadcrumb-item"
    {{ $attributes->tailwindMerge('inline-flex items-center gap-1.5') }}
>
    {{ $slot }}
</li>
