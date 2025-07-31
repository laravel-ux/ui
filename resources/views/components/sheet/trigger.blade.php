<div
    x-on:click="open = true"
    data-slot="sheet-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="open"
    {{ $attributes }}
>
    {{ $slot }}
</div>
