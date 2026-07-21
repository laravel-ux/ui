@blaze
<div
    data-slot="card-content"
    {{ $attributes->tailwindMerge('px-(--card-spacing)') }}
>
    {{ $slot }}
</div>
