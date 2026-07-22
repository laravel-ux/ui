@props([
    'asChild' => false,
    'delay' => 600,
    'closeDelay' => 300,
])
@php
    $attributes = $attributes->merge([
        'x-hover-card-trigger' => '',
        'x-bind:data-hover-card-delay' => $delay,
        'x-bind:data-hover-card-close-delay' => $closeDelay,
        'data-slot' => 'hover-card-trigger',
    ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <button type="button" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
