@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-dropdown-menu-trigger' => '',
        'data-slot' => 'dropdown-menu-trigger',
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
