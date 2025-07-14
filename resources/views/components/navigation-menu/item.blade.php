<li
    data-slot="navigation-menu-item"
    x-data="{ show: false }"
    {{ $attributes->tailwindMerge('relative') }}
>
    {{ $slot }}
</li>
