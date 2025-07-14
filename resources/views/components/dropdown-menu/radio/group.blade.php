@props([
    'value' => '',
])
<div
    {{ $attributes }}
    data-slot="dropdown-menu-radio-group"
    role="group"
    x-data="{ value: '{{ $value }}' }"
>
    {{ $slot }}
</div>
