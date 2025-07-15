@props([
    'asChild' => false,
])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'x-on:mouseenter' => 'show = true',
        'x-on:mouseleave' => 'show = false',
        'data-slot' => 'tooltip-trigger',
        'aria-haspopup' => 'menu',
        'x-bind:data-state' => "show ? 'open' : 'closed'",
    ]);
@endphp
@if($asChild)
    @asChild($attributes->toArray())
        {{ $slot }}
    @endAsChild
@else
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
@endif
