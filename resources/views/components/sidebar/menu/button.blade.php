@props([
    'active' => false,
    'variant' => 'default',
    'size' => 'default',
    'tooltip' => null,
])
@php
    $attributes = $attributes
        ->tailwindMerge([
            'peer/menu-button flex w-full items-center gap-2 overflow-hidden rounded-md p-2 text-start text-sm outline-hidden ring-sidebar-ring transition-[width,height,padding] hover:bg-sidebar-accent hover:text-sidebar-accent-foreground focus-visible:ring-2 active:bg-sidebar-accent active:text-sidebar-accent-foreground disabled:pointer-events-none disabled:opacity-50 group-has-data-[sidebar=menu-action]/menu-item:pe-8 aria-disabled:pointer-events-none aria-disabled:opacity-50 data-[active=true]:bg-sidebar-accent data-[active=true]:font-medium data-[active=true]:text-sidebar-accent-foreground data-[state=open]:hover:bg-sidebar-accent data-[state=open]:hover:text-sidebar-accent-foreground group-data-[collapsible=icon]:size-8! group-data-[collapsible=icon]:p-2! [&>span:last-child]:truncate [&>svg]:size-4 [&>svg]:shrink-0',
            match ($variant) {
                'outline' => 'bg-background shadow-[0_0_0_1px_var(--sidebar-border)] hover:bg-sidebar-accent hover:text-sidebar-accent-foreground hover:shadow-[0_0_0_1px_var(--sidebar-accent)]',
                default => 'hover:bg-sidebar-accent hover:text-sidebar-accent-foreground',
            },
            match ($size) {
                'sm' => 'h-7 text-xs',
                'lg' => 'h-12 text-sm group-data-[collapsible=icon]:p-0!',
                default => 'h-8 text-sm',
            },
        ])
        ->merge([
            'data-slot' => 'sidebar-menu-button',
            'data-sidebar' => 'menu-button',
            'data-size' => $size,
            'data-active' => $active ? 'true' : 'false',
        ]);
@endphp
@if ($tooltip)
    <x-ux::tooltip>
        <x-ux::tooltip.trigger as-child>
            @if ($attributes->has('href'))
                <a {{ $attributes }}>{{ $slot }}</a>
            @else
                <button type="button" {{ $attributes }}>{{ $slot }}</button>
            @endif
        </x-ux::tooltip.trigger>
        <x-ux::tooltip.content
            side="right"
            align="center"
            x-bind:hidden="__sidebarProviderOpen || __sidebarProviderIsMobile"
        >
            {{ $tooltip }}
        </x-ux::tooltip.content>
    </x-ux::tooltip>
@elseif ($attributes->has('href'))
    <a {{ $attributes }}>{{ $slot }}</a>
@else
    <button type="button" {{ $attributes }}>{{ $slot }}</button>
@endif
