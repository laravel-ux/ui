@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'data-slot' => 'popover-trigger',
        'aria-haspopup' => 'dialog',
        'x-on:click' => '__popoverOpen = ! __popoverOpen',
        'x-bind:aria-expanded' => '__popoverOpen',
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
