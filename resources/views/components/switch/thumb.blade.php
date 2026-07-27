@blaze
<span
    x-cloak
    x-switch-thumb
    data-slot="switch-thumb"
    {{ $attributes->tailwindMerge('pointer-events-none block rounded-full bg-background ring-0 transition-transform dark:data-[state=unchecked]:bg-foreground dark:data-[state=checked]:bg-primary-foreground group-data-[size=default]/switch:size-4 group-data-[size=sm]/switch:size-3 data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0 rtl:data-[state=checked]:-translate-x-[calc(100%-2px)]') }}
></span>
