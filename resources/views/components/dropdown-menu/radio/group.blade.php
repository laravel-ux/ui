@props(['value' => ''])
<div
    data-slot="dropdown-menu-radio-group"
    role="group"
    x-data="{ value: @js($value) }"
    x-modelable="value"
    {{ $attributes }}
>
    {{ $slot }}
</div>
