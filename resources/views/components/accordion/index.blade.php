@props(['value' => ''])
<div
    data-slot="accordion"
    x-data="{ value: @js($value) }"
    x-modelable="value"
    {{ $attributes }}
>
    {{ $slot }}
</div>
