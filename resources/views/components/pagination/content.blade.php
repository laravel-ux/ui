@blaze
<ul
    data-slot="pagination-content"
    {{ $attributes->tailwindMerge('flex flex-row items-center gap-1') }}
>
    {{ $slot }}
</ul>
