<li
    data-slot="navigation-menu-item"
    x-data="{ __navigationMenuItemOpen: false }"
    x-modelable="__navigationMenuItemOpen"
    {{ $attributes->tailwindMerge('relative') }}
>
    {{ $slot }}
</li>
