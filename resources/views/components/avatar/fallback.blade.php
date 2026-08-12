@blaze
<span
    x-avatar-fallback
    data-slot="avatar-fallback"
    {{ $attributes->tailwindMerge('bg-muted text-muted-foreground flex size-full items-center justify-center rounded-full text-sm group-data-[size=sm]/avatar:text-xs') }}
>
    {{ $slot }}
</span>
