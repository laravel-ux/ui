@props(['open' => false])
<div
    x-data
    x-dialog="@js($open)"
    data-slot="dialog"
    {{ $attributes->tailwindMerge('flex') }}
>
    <x-ux::portal>
        <x-ux::dialog.overlay />
    </x-ux::portal>
    {{ $slot }}
</div>
