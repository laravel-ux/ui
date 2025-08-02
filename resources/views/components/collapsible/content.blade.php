<div
    data-slot="collapsible-content"
    x-cloak
    x-collapse
    x-show="__collapsibleOpen"
    x-bind:data-state="__collapsibleOpen ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
