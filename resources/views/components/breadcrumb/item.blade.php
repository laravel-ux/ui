@blaze
<li
    data-slot="breadcrumb-item"
    {{ $attributes->tailwindMerge('inline-flex items-center gap-1') }}
>
    {{ $slot }}
</li>
