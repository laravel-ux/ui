@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'x-on:click' => 'show = ! show',
        'data-slot' => 'collapsible-trigger',
        'x-bind:aria-expanded' => 'show',
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
