@props([
    'showIcon' => false,
])
<button
    data-sidebar="menu-badge"
    {{
        $attributes->tailwindMerge([
            'pointer-events-none absolute right-1 flex h-5 min-w-5 select-none items-center justify-center rounded-md px-1 text-xs font-medium tabular-nums text-sidebar-foreground',
            'peer-hover/menu-button:text-sidebar-accent-foreground peer-data-[active=true]/menu-button:text-sidebar-accent-foreground',
            'peer-data-[size=sm]/menu-button:top-1',
            'peer-data-[size=default]/menu-button:top-1.5',
            'peer-data-[size=lg]/menu-button:top-2.5',
            'group-data-[collapsible=icon]:hidden',
        ])
    }}
>
    @if($showIcon)
        <x-ui::skeleton
            class="size-4 rounded-md"
            data-sidebar="menu-skeleton-icon"
        />
    @endif
    <x-ui::skeleton
        class="h-4 max-w-[--skeleton-width] flex-1"
        data-sidebar="menu-skeleton-text"
{{--        style="--skeleton-width: {{  }};"--}}
    />
</button>
