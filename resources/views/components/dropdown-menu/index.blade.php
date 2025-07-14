<div
    {{ $attributes->tailwindMerge('relative flex items-center') }}
    x-data="{ show: false }"
    data-slot="dropdown-menu"
>
    {{ $slot }}
</div>
