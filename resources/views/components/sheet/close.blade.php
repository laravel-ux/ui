<x-ux::button
    x-on:click="__sheetOpen = false"
    data-slot="sheet-close"
    {{ $attributes }}
>
    {{ $slot }}
</x-ux::button>
