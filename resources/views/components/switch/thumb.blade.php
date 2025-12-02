@blaze
<span
    x-cloak
    x-switch-thumb
    data-slot="switch-thumb"
    {{ $attributes->tailwindMerge(['bg-background dark:data-[state=unchecked]:bg-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0']) }}
></span>
