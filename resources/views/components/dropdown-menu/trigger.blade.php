@props([
    'asChild' => false,
])
@php
    $attributes = $attributes->merge([
        'x-ref' => 'trigger',
        'x-on:click' => 'show = ! show',
        'data-slot' => 'dropdown-menu-trigger',
        'aria-haspopup' => 'menu',
        'x-bind:aria-expanded' => 'show',
    ]);
@endphp
@if($asChild)
    @asChild($attributes->toArray())
        {{ $slot }}
    @endAsChild
@else
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
@endif
