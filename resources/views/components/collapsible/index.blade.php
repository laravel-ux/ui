@props(['open' => false])
<div
    data-slot="collapsible"
    x-data="{ show: @js($open) }"
    x-bind:data-state="show ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
