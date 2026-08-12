@blaze
@props(['value' => ''])
<div
    x-data
    x-dropdown-menu-radio-group="{{ $value }}"
    data-slot="dropdown-menu-radio-group"
    role="group"
    {{ $attributes }}
>
    {{ $slot }}
</div>
