@blaze
@props([
    'variant' => 'ghost',
    'size' => 'xs',
])
@php
    $attributes = $attributes
        ->merge(['type' => 'button', 'variant' => $variant, 'data-size' => $size])
        ->tailwindMerge([
            'text-sm shadow-none flex gap-2 items-center',
            match ($size) {
                'sm' => 'h-8 gap-1.5 rounded-md px-2.5',
                'icon-xs' => 'size-6 rounded-[calc(var(--radius)-3px)] p-0 has-[>svg]:p-0',
                'icon-sm' => 'size-8 p-0 has-[>svg]:p-0',
                default => "h-6 gap-1 rounded-[calc(var(--radius)-3px)] px-1.5 [&>svg:not([class*='size-'])]:size-3.5",
            },
        ]);
@endphp
<x-ux::button data-slot="input-group-button" {{ $attributes }}> {{ $slot }} </x-ux::button>
