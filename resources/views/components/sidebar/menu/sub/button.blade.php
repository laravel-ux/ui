@props([
    'active' => false,
    'size' => 'md',
])
<button
    data-sidebar="menu-sub-button"
    data-size="{{ $size }}"
    data-active="{{ $active }}"
    {{
        $attributes->tailwindMerge([
            'flex h-7 min-w-0 -translate-x-px items-center gap-2 overflow-hidden rounded-md px-2 text-sidebar-foreground outline-none ring-sidebar-ring hover:bg-sidebar-accent hover:text-sidebar-accent-foreground focus-visible:ring-2 active:bg-sidebar-accent active:text-sidebar-accent-foreground disabled:pointer-events-none disabled:opacity-50 aria-disabled:pointer-events-none aria-disabled:opacity-50 [&>span:last-child]:truncate [&>svg]:size-4 [&>svg]:shrink-0 [&>svg]:text-sidebar-accent-foreground',
            'data-[active=true]:bg-sidebar-accent data-[active=true]:text-sidebar-accent-foreground',
            match ($size) {
                'sm' => 'text-xs',
                'md' => 'text-sm',
            },
            '"group-data-[collapsible=icon]:hidden',
        ])
    }}
>
    {{ $slot }}
</button>
