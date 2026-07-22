@blaze
<div
    data-slot="message-footer"
    {{ $attributes->tailwindMerge('flex items-center gap-1 px-3 text-xs font-medium text-muted-foreground group-has-data-[variant=ghost]/message:px-0') }}
>
    {{ $slot }}
</div>
