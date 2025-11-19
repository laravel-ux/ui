<div
    x-data
    x-dropdown-menu
    data-slot="dropdown-menu"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
