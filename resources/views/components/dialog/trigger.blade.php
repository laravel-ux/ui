<div
    x-on:click="__dialogOpen = ! __dialogOpen"
    data-slot="dialog-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="__dialogOpen"
    {{ $attributes }}
>
    {{ $slot }}
</div>
