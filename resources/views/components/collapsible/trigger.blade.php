@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-on:click' => '__collapsibleOpen = ! __collapsibleOpen',
        'data-slot' => 'collapsible-trigger',
        'x-bind:aria-expanded' => '__collapsibleOpen',
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
