<div
    x-data="{ open: false }"
    x-modelable="open"
    data-slot="dropdown-menu-sub"
    {{ $attributes }}
>
    {{ $slot }}
</div>
