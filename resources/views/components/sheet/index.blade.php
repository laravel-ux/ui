@props(['open' => false])
<div
    x-data="{
        __sheetOpen: @js($open),
        __sheetToggleOverflow() { document.body.style.overflow = this.__sheetOpen ? 'hidden' : '' }
    }"
    x-init="if (__sheetOpen) __sheetToggleOverflow(); $watch('__sheetOpen', () => { __sheetToggleOverflow() })"
    x-modelable="__sheetOpen"
    data-slot="sheet"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::sheet.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
