<div
    data-slot="collapsible-content"
    x-cloak
    x-collapse
    x-show="open"
    x-bind:data-state="open ? 'open' : 'closed'"
    {{ $attributes }}
>
    {{ $slot }}
</div>
