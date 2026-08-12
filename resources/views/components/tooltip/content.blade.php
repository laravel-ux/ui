@blaze
@props([
    'align' => 'center',
    'side' => 'top',
    'sideOffset' => 0,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
@teleport('body')
    <div
        x-cloak
        x-tooltip-content.{{ $position }}.offset.{{ $sideOffset + 5 }}
        x-direction-portal
        role="tooltip"
        data-slot="tooltip-content"
        data-side="{{ $side }}"
        {{ $attributes->tailwindMerge('z-50 inline-flex w-fit max-w-xs items-center gap-1.5 rounded-md bg-foreground px-3 py-1.5 text-xs text-background data-[state=open]:animate-in data-[state=open]:fade-in-0 data-[state=open]:zoom-in-95 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=closed]:zoom-out-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 has-data-[slot=kbd]:pe-1.5 **:data-[slot=kbd]:relative **:data-[slot=kbd]:isolate **:data-[slot=kbd]:z-50 **:data-[slot=kbd]:rounded-sm') }}
    >
        {{ $slot }}
        <div
            data-slot="tooltip-arrow"
            @class([
                'absolute z-[-1] size-2.5 rotate-45 rounded-[2px] bg-foreground fill-foreground',
                match ($side) {
                    'top' => '-bottom-1 left-1/2 -translate-x-1/2',
                    'right' => '-left-1 top-1/2 -translate-y-1/2',
                    'bottom' => '-top-1 left-1/2 -translate-x-1/2',
                    'left' => '-right-1 top-1/2 -translate-y-1/2',
                },
            ])
        ></div>
    </div>
@endteleport
