<x-ux::button
    data-slot="dialog-close"
    x-on:click="__dialogOpen = false"
    {{ $attributes }}
>
    {{ $slot }}
</x-ux::button>
