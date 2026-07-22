@blaze
@props([
    'align' => 'center',
    'side' => 'bottom',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-hover-card-content.{{ $position }}.offset.{{ $sideOffset }}
        x-direction-portal
        data-slot="hover-card-content"
        data-side="{{ $side }}"
        {{ $attributes->tailwindMerge('bg-popover text-popover-foreground z-50 w-64 rounded-lg p-2.5 text-sm shadow-md ring-1 ring-foreground/10 outline-hidden') }}
    >
        {{ $slot }}
    </div>
@endteleport
