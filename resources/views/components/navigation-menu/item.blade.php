<li
    data-slot="navigation-menu-item"
    x-data="{ open: false }"
    x-modelable="open"
    {{ $attributes->tailwindMerge('relative') }}
>
    {{ $slot }}
</li>
