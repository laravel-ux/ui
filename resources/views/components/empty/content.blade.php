@blaze
<div
    data-slot="empty-content"
    {{ $attributes->tailwindMerge('flex w-full max-w-sm min-w-0 flex-col items-center gap-2.5 text-sm text-balance') }}
>
    {{ $slot }}
</div>
