<div
    {{ $attributes->tailwindMerge('flex') }}
    x-data="{ show: false }"
    data-slot="dropdown-menu"
>
    {{ $slot }}
</div>
