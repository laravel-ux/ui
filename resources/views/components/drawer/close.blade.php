@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-drawer-close' => '',
        'data-slot' => 'drawer-close',
    ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <x-ux::button {{ $attributes }}>
        {{ $slot }}
    </x-ux::button>
@endif
