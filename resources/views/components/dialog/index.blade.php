@props(['open' => false])
<div
    x-data="{
        open: @js($open),
        toggleOverflow() { document.body.style.overflow = this.open ? 'hidden' : '' }
    }"
    x-init="if (open) toggleOverflow(); $watch('open', () => { toggleOverflow() })"
    x-modelable="open"
    data-slot="dialog"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::dialog.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
