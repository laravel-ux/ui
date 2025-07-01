@props(['active' => ''])
<div
    data-slot="accordion"
    x-data="{
        active: '{{ $active }}'
    }"
    {{ $attributes }}
>
    {{ $slot }}
</div>
