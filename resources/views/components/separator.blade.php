@props([
    'orientation' => 'horizontal',
    'decorative' => true,
])
@php
    $attributes = $attributes
        ->when(
            $decorative,
            fn($attributes) => $attributes->offsetSet('role', 'none'),
            fn($attributes) => $attributes->merge(['role' => 'separator', 'aria-orientation' => $orientation])
        )
        ->tailwindMerge('bg-border shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px')
        ->merge(['data-slot' => 'separator', 'data-orientation' => $orientation]);
@endphp
<div {{ $attributes }}></div>
