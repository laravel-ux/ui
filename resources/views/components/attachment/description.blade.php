@blaze
<span
    data-slot="attachment-description"
    {{ $attributes->tailwindMerge('block max-w-full min-w-0 truncate mt-0.5 text-xs text-muted-foreground group-data-[state=error]/attachment:text-destructive/80') }}
>
    {{ $slot }}
</span>
