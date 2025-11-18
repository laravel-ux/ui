@props(['open' => false])
<div
    x-collapsible="{{ $open ?: '' }}"
    data-slot="collapsible"
    {{ $attributes }}
>
    {{ $slot }}
</div>
