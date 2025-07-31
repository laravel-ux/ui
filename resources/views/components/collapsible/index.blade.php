@props(['open' => false])
<div
    data-slot="collapsible"
    x-data="{ open: @js($open) }"
    x-modelable="open"
    x-bind:data-state="open ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
