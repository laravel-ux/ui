@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes->merge([
        'x-dialog-trigger' => '',
        'data-slot' => 'sheet-trigger',
        'aria-haspopup' => 'dialog',
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
