@props(['open' => false])
<div
    x-dialog
    data-slot="dialog"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::dialog.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
