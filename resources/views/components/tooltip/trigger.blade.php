@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-tooltip-trigger' => '',
        'data-slot' => 'tooltip-trigger',
        'aria-haspopup' => 'menu',
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
