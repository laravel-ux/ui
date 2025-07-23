<div
    {{ $attributes->tailwindMerge('flex') }}
    x-data="{ show: false }"
    x-init="$watch('show', show => { document.body.classList.toggle('overflow-hidden', show) })"
    data-slot="dialog"
>
    @teleport('body')
        <x-ux::dialog.overlay />
    @endteleport
    {{ $slot }}
</div>
