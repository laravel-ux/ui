@props([
    'orientation' => 'horizontal',
])
@php
    $attributes = $attributes
        ->tailwindMerge('bg-border shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px')
        ->merge(['data-slot' => 'separator', 'data-orientation' => $orientation]);
@endphp
<div {{ $attributes }}></div>
