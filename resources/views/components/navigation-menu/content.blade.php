@props([
    'align' => 'start',
    'side' => 'bottom',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
<div
    x-cloak
    x-navigation-menu-content.{{ $position }}.offset.{{ $sideOffset }}
    data-slot="navigation-menu-content"
    {{ $attributes->tailwindMerge("bg-popover text-popover-foreground data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=open]:fade-in-0 data-[state=closed]:fade-out-0 p-2 pr-2.5 z-50 overflow-hidden rounded-md border shadow **:data-[slot=navigation-menu-link]:focus:ring-0 **:data-[slot=navigation-menu-link]:focus:outline-none") }}
>
    {{ $slot }}
</div>

