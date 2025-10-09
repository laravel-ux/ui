@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'data-slot' => 'tooltip-trigger',
        'aria-haspopup' => 'menu',
        'x-on:mouseenter' => '__tooltipOpen = true',
        'x-on:mouseleave' => '__tooltipOpen = false',
    ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <button {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
