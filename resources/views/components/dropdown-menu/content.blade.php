@blaze
@props([
    'align' => 'start',
    'side' => 'bottom',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-dropdown-menu-content.{{ $position }}.offset.{{ $sideOffset }}
        x-direction-portal
        role="menu"
        tabindex="-1"
        data-side="{{ $side }}"
        data-slot="dropdown-menu-content"
        {{ $attributes->tailwindMerge("z-50 max-h-[var(--dropdown-menu-available-height)] w-[var(--dropdown-menu-trigger-width)] min-w-32 overflow-x-hidden overflow-y-auto rounded-lg bg-popover p-1 text-popover-foreground shadow-md ring-1 ring-foreground/10 outline-none") }}
    >
        {{ $slot }}
    </div>
@endteleport
