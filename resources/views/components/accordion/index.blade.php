@props(['active' => ''])
<div
    {{ $attributes }}
    data-slot="accordion"
    x-data="{active: @js($active)}"
>
    {{ $slot }}
</div>
