@props(['value' => ''])
<div
    x-data
    x-accordion="{{ $value }}"
    data-slot="accordion"
    {{ $attributes }}
>
    {{ $slot }}
</div>
