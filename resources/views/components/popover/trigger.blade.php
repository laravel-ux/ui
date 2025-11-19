@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-popover-trigger' => '',
        'data-slot' => 'popover-trigger',
        'aria-haspopup' => 'dialog',
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
