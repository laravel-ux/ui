@props(['open' => false])
<div
    data-slot="collapsible"
    x-data="{ __collapsibleOpen: @js($open) }"
    x-modelable="__collapsibleOpen"
    x-bind:data-state="__collapsibleOpen ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
