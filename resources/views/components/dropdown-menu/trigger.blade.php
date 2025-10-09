@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'x-on:click' => '__dropdownMenuOpen = ! __dropdownMenuOpen',
        'data-slot' => 'dropdown-menu-trigger',
        'aria-haspopup' => 'menu',
        'x-bind:aria-expanded' => '__dropdownMenuOpen',
        'x-bind:data-state' => str("__dropdownMenuOpen ? 'open' : 'closed'"),
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
