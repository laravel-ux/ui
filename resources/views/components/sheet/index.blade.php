@props(['open' => false])
<div
    x-data
    x-sheet="@js($open)"
    data-slot="sheet"
    {{ $attributes->tailwindMerge('flex') }}
>
    @teleport('body')
        <x-ux::sheet.overlay />
    @endteleport
    {{ $slot }}
</div>
