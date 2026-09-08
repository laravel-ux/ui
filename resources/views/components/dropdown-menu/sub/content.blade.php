@blaze
@props([
    'align' => 'start',
    'side' => null,
    'sideOffset' => 0,
])
@php($position = ($side ?? 'right') . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-dropdown-menu-sub-content.{{ $position }}{{ $side === null ? '.logical' : '' }}.offset.{{ $sideOffset }}
        x-direction-portal
        data-side="{{ $side ?? 'right' }}"
        data-slot="dropdown-menu-sub-content"
        role="menu"
        tabindex="-1"
        {{ $attributes->tailwindMerge('z-50 w-auto min-w-24 rounded-lg bg-popover p-1 text-popover-foreground shadow-lg ring-1 ring-foreground/10 outline-none') }}
    >
        {{ $slot }}
    </div>
@endteleport
