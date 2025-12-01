@blaze
<div
    data-slot="alert-title"
    {{ $attributes->tailwindMerge('col-start-2 line-clamp-1 min-h-4 font-medium tracking-tight') }}
>
    {{ $slot }}
</div>
