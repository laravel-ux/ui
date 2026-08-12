@blaze
@props([
    'inset' => false,
    'variant' => 'default',
    'disabled' => false,
])
<div
    x-dropdown-menu-item
    data-slot="dropdown-menu-item"
    data-variant="{{ $variant }}"
    role="menuitem"
    tabindex="-1"
    {{
        $attributes
            ->when($inset, fn ($attributes) => $attributes->offsetSet('data-inset', 'true'))
            ->when($disabled, fn ($attributes) => $attributes->offsetSet('data-disabled', 'true'))
            ->when($disabled, fn ($attributes) => $attributes->offsetSet('aria-disabled', 'true'))
            ->tailwindMerge("group/dropdown-menu-item relative flex cursor-default items-center gap-1.5 rounded-md px-1.5 py-1 text-sm outline-hidden select-none focus:bg-accent focus:text-accent-foreground not-data-[variant=destructive]:focus:**:text-accent-foreground data-[inset]:ps-7 data-[variant=destructive]:text-destructive data-[variant=destructive]:focus:bg-destructive/10 data-[variant=destructive]:focus:text-destructive dark:data-[variant=destructive]:focus:bg-destructive/20 data-disabled:pointer-events-none data-disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4 data-[variant=destructive]:*:[svg]:text-destructive")
    }}
>
    {{ $slot }}
</div>
