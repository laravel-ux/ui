<x-ux::button
    data-slot="dialog-close"
    x-on:click="open = false"
    {{ $attributes }}
>
    {{ $slot }}
</x-ux::button>
