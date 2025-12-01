@props(['open' => false])
<div
    x-data
    x-dialog="@js($open)"
    data-slot="dialog"
    {{ $attributes->tailwindMerge('flex') }}
>
    @teleport('body')
        <x-ux::dialog.overlay />
    @endteleport
    {{ $slot }}
</div>
