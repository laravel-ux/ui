<div
    data-slot="collapsible-content"
    x-cloak
    x-collapse
    x-show="show"
    x-bind:data-state="show ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
