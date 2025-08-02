@props(['open' => false])
<div
    x-data="{
        __dialogOpen: @js($open),
        __dialogToggleOverflow() { document.body.style.overflow = this.__dialogOpen ? 'hidden' : '' }
    }"
    x-init="if (__dialogOpen) __dialogToggleOverflow(); $watch('__dialogOpen', () => { __dialogToggleOverflow() })"
    x-modelable="__dialogOpen"
    data-slot="dialog"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::dialog.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
