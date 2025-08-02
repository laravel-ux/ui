@props(['value' => ''])
<div
    data-slot="dropdown-menu-radio-group"
    role="group"
    x-data="{ __dropdownMenuRadioGroupValue: @js($value) }"
    x-modelable="__dropdownMenuRadioGroupValue"
    {{ $attributes }}
>
    {{ $slot }}
</div>
