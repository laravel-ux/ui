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
        x-popover-content.{{ $position }}.offset.{{ $sideOffset }}
        x-direction-portal
        role="dialog"
        tabindex="-1"
        data-side="{{ $side }}"
        data-slot="popover-content"
        {{ $attributes->tailwindMerge('bg-popover text-popover-foreground data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 z-50 w-72 rounded-md border p-4 shadow-md outline-hidden') }}
    >
        {{ $slot }}
    </div>
@endteleport
