<div
    x-on:click="__sheetOpen = true"
    data-slot="sheet-trigger"
    aria-haspopup="dialog"
    x-bind:aria-expanded="__sheetOpen"
    {{ $attributes }}
>
    {{ $slot }}
</div>
