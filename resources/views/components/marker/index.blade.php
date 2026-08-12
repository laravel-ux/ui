@blaze
@props([
    'asChild' => false,
    'variant' => 'default',
])
@php
    $attributes = $attributes
        ->merge([
            'data-slot' => 'marker',
            'data-variant' => $variant,
        ])
        ->tailwindMerge(
            "group/marker relative flex min-h-4 w-full items-center gap-2 text-start text-sm text-muted-foreground [a]:underline [a]:underline-offset-3 [a]:hover:text-foreground [&_svg:not([class*='size-'])]:size-4",
            match ($variant) {
                'separator' => 'before:me-1 before:h-px before:min-w-0 before:flex-1 before:bg-border after:ms-1 after:h-px after:min-w-0 after:flex-1 after:bg-border',
                'border' => 'border-b border-border pb-2',
                default => '',
            },
        );
@endphp
@if ($asChild)
    <x-ux::as-child {{ $attributes }}>{{ $slot }}</x-ux::as-child>
@else
    <div {{ $attributes }}>{{ $slot }}</div>
@endif
