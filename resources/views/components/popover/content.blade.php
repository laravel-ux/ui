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
        {{ $attributes->tailwindMerge('z-50 flex w-72 flex-col gap-2.5 rounded-lg bg-popover p-2.5 text-sm text-popover-foreground shadow-md ring-1 ring-foreground/10 outline-hidden') }}
    >
        {{ $slot }}
    </div>
@endteleport
