@blaze
@props([
    'align' => 'start',
    'side' => 'right',
    'sideOffset' => 0,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-dropdown-menu-sub-content.{{ $position }}.offset.{{ $sideOffset }}
        data-side="{{ $side }}"
        data-slot="dropdown-menu-sub-content"
        role="menu"
        tabindex="-1"
        {{ $attributes->tailwindMerge('z-50 w-auto min-w-24 rounded-lg bg-popover p-1 text-popover-foreground shadow-lg ring-1 ring-foreground/10 duration-100 outline-none data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 data-open:animate-in data-open:fade-in-0 data-open:zoom-in-95 data-closed:animate-out data-closed:fade-out-0 data-closed:zoom-out-95') }}
    >
        {{ $slot }}
    </div>
@endteleport
