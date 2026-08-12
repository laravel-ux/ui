@blaze
@aware(['direction' => null])
@props([
    'align' => 'start',
    'side' => 'bottom',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-select-content.{{ $position }}.offset.{{ $sideOffset }}="@js($direction)"
        x-direction-portal
        data-slot="select-content"
        data-side="{{ $side }}"
        role="listbox"
        tabindex="-1"
        {{ $attributes->tailwindMerge('relative z-50 max-h-[var(--select-available-height)] min-w-36 overflow-x-hidden overflow-y-auto rounded-lg bg-popover text-popover-foreground shadow-md ring-1 ring-foreground/10 outline-none') }}
    >
        <x-ux::select.viewport> {{ $slot }} </x-ux::select.viewport>
    </div>
@endteleport
