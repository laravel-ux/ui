@props(['open' => false])
<div
    x-data
    x-collapsible="{{ $open ? 'true' : '' }}"
    data-slot="collapsible"
    {{ $attributes }}
>
    {{ $slot }}
</div>
