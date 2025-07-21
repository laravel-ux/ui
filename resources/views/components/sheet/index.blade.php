<div
    {{ $attributes }}
    x-data="{ show: false }"
    data-slot="sheet"
>
    @teleport('body')
        <x-ux::sheet.overlay />
    @endteleport
    {{ $slot }}
</div>
