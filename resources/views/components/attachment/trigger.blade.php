@blaze
@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge(['data-slot' => 'attachment-trigger'])
        ->tailwindMerge('absolute inset-0 z-10 outline-none');
@endphp
@if ($asChild)
    <x-ux::as-child {{ $attributes }}>{{ $slot }}</x-ux::as-child>
@else
    <button {{ $attributes->merge(['type' => 'button']) }}>{{ $slot }}</button>
@endif
