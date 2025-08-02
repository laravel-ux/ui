@props(['value' => ''])
<div
    data-slot="accordion"
    x-data="{ __accordionValue: @js($value) }"
    x-modelable="__accordionValue"
    {{ $attributes }}
>
    {{ $slot }}
</div>
