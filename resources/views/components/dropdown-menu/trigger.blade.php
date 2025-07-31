@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'x-on:click' => 'open = ! open',
        'data-slot' => 'dropdown-menu-trigger',
        'aria-haspopup' => 'menu',
        'x-bind:aria-expanded' => 'open',
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
