@props(['open' => false])
<div
    x-data
    x-sheet="@js($open)"
    data-slot="sheet"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::sheet.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
