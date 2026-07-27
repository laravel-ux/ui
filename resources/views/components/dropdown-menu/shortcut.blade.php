@blaze
<span
    data-slot="dropdown-menu-shortcut"
    {{ $attributes->tailwindMerge('ms-auto text-xs tracking-widest text-muted-foreground group-focus/dropdown-menu-item:text-accent-foreground') }}
>
    {{ $slot }}
</span>
