<div
    x-ref="trigger"
    x-on:click="open = ! open"
    data-slot="popover-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="open"
    {{ $attributes }}
>
    {{ $slot }}
</div>
