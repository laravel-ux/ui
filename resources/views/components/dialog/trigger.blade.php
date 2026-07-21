@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-dialog-trigger' => '',
        'data-slot' => 'dialog-trigger',
        'aria-haspopup' => 'dialog',
    ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <button {{ $attributes->merge(['type' => 'button']) }}>
        {{ $slot }}
    </button>
@endif
