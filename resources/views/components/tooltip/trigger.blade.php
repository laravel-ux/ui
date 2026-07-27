@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-tooltip-trigger' => '',
        'data-slot' => 'tooltip-trigger',
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
