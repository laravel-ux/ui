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
            'group/item flex items-center border border-transparent text-sm rounded-md transition-colors [a]:hover:bg-accent/50 [a]:transition-colors duration-100 flex-wrap outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
            match ($size) {
                'sm' => 'py-3 px-4 gap-2.5',
                default => 'p-4 gap-4',
            },
            match ($variant) {
                'muted' => 'bg-muted/50',
                'outline' => 'border-border',
                default => 'bg-transparent',
            },
        );
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
@endif
