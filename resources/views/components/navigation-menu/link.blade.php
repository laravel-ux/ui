@props([
    'active' => false,
])
@php
    $attributes = $attributes
        ->when($active, fn($attributes) => $attributes->offsetSet('data-active', 'true'))
        ->tailwindMerge("data-[active=true]:focus:bg-accent data-[active=true]:hover:bg-accent data-[active=true]:bg-accent/50 data-[active=true]:text-accent-foreground hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus-visible:ring-ring/50 [&_svg:not([class*='text-'])]:text-muted-foreground flex flex-col gap-1 rounded-sm p-2 text-sm transition-all font-medium outline-none focus-visible:ring-[3px] focus-visible:outline-1 [&_svg:not([class*='size-'])]:size-4")
        ->merge(['data-slot' => 'navigation-menu-link']);
@endphp
@if($attributes->has('href'))
    <a {{ $attributes }}>{{ $slot }}</a>
@else
    <button {{ $attributes }}>{{ $slot }}</button>
@endif
