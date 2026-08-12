@blaze
<div
    data-slot="empty"
    {{ $attributes->tailwindMerge('flex w-full min-w-0 flex-1 flex-col items-center justify-center gap-4 rounded-xl border-dashed p-6 text-center text-balance') }}
>
    {{ $slot }}
</div>
