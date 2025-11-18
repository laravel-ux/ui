@props(['value' => ''])
<div
    x-accordion="{{ $value }}"
    data-slot="accordion"
    {{ $attributes }}
>
    {{ $slot }}
</div>
