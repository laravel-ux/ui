<div
    x-on:click="open = ! open"
    data-slot="dialog-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="open"
    {{ $attributes }}
>
    {{ $slot }}
</div>
