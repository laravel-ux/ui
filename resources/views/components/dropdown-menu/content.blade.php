@props([
    'align' => 'start',
    'side' => 'bottom',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
<div
    x-cloak
    x-show="__dropdownMenuOpen"
    x-anchor.{{ $position }}.offset.{{ $sideOffset }}="$refs.trigger"
    x-bind:data-state="__dropdownMenuOpen ? 'open' : 'closed'"
    x-on:click.outside="__dropdownMenuOpen = false"
    role="menu"
    tabindex="-1"
    data-side="{{ $side }}"
    data-slot="dropdown-menu-content"
    {{ $attributes->tailwindMerge('bg-popover text-popover-foreground data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 z-50 min-w-[8rem] overflow-x-hidden overflow-y-auto rounded-md border p-1 shadow-md') }}
>
    {{ $slot }}
</div>
