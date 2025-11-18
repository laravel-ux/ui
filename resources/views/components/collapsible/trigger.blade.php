@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-collapsible-trigger' => '',
        'data-slot' => 'collapsible-trigger',
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
