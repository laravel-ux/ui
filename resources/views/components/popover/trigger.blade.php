<div
    x-ref="trigger"
    x-on:click="__popoverOpen = ! __popoverOpen"
    data-slot="popover-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="__popoverOpen"
    {{ $attributes }}
>
    {{ $slot }}
</div>
