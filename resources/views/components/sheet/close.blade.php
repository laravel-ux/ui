<x-ux::button
    x-on:click="open = false"
    data-slot="sheet-close"
    {{ $attributes }}
>
    {{ $slot }}
</x-ux::button>
