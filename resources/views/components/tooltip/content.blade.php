@props([
    'align' => 'center',
    'side' => 'top',
    'sideOffset' => 4,
])
@php($position = $side . data_get(['end' => '-end', 'start' => '-start'], $align))
<x-ux::portal>
    <div
        x-tooltip-content.{{ $position }}.offset.{{ $sideOffset + 4 }}
        data-slot="tooltip-content"
        data-side="{{ $side }}"
        {{ $attributes->tailwindMerge('bg-primary text-primary-foreground animate-in fade-in-0 zoom-in-95 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=closed]:zoom-out-95 data-[side=bottom]:slide-in-from-top-2 data-[side=left]:slide-in-from-right-2 data-[side=right]:slide-in-from-left-2 data-[side=top]:slide-in-from-bottom-2 z-50 w-fit rounded-md px-3 py-1.5 text-sm text-balance') }}
    >
        {{ $slot }}
        <div
            @class([
                'absolute w-2 h-2 bg-primary rotate-45 z-[-1]',
                match ($side) {
                    'top' => '-bottom-1 left-1/2 -translate-x-1/2',
                    'right' => 'left-1 top-1/2 -translate-x-full -translate-y-1/2',
                    'bottom' => '-top-1 left-1/2 -translate-x-1/2',
                    'left' => 'right-1 top-1/2 translate-x-full -translate-y-1/2',
                },
            ])
        ></div>
    </div>
</x-ux::portal>
