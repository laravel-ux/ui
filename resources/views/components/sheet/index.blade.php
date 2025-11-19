@props(['open' => false])
<div
    x-data
    x-sheet="{{ $open ? 'true' : '' }}"
    data-slot="sheet"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::sheet.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
