@props(['open' => false])
<div
    x-data
    x-collapsible="{{ $open ?: '' }}"
    data-slot="collapsible"
    {{ $attributes }}
>
    {{ $slot }}
</div>
