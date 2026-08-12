@blaze
@props(['open' => false])
<div
    x-data
    x-dialog
    data-slot="sheet"
    {{ $attributes->merge(['data-state' => $open ? 'open' : 'closed'])->tailwindMerge('contents') }}
>
    @teleport('body')
        <x-ux::sheet.overlay />
    @endteleport
    {{ $slot }}
</div>
