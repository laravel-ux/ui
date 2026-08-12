@props([
    'asChild' => false,
    'size' => 'default',
    'variant' => 'default',
])
@php
    $attributes = $attributes
        ->merge([
            'data-slot' => 'item',
            'data-size' => $size,
            'data-variant' => $variant,
        ])
        ->tailwindMerge(
            'group/item flex w-full flex-wrap items-center rounded-lg border text-sm transition-colors duration-100 outline-none focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 [a]:transition-colors [a]:hover:bg-muted',
            match ($size) {
                'xs' => 'gap-2 px-2.5 py-2 in-data-[slot=dropdown-menu-content]:p-0',
                default => 'gap-2.5 px-3 py-2.5',
            },
            match ($variant) {
                'muted' => 'bg-muted/50',
                'outline' => 'border-border',
                default => 'border-transparent',
            },
        );
@endphp
@if ($asChild)
    <x-ux::as-child {{ $attributes }}> {{ $slot }} </x-ux::as-child>
@else
    <div {{ $attributes }}>{{ $slot }}</div>
@endif
