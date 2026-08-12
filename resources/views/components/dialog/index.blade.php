@blaze
@props(['open' => false])
<div
    x-data
    x-dialog
    data-slot="dialog"
    {{ $attributes->merge(['data-state' => $open ? 'open' : 'closed'])->tailwindMerge('contents') }}
>
    @teleport('body')
        <x-ux::dialog.overlay />
    @endteleport
    {{ $slot }}
</div>
