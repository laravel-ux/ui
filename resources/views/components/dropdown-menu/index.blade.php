@props(['open' => false])
<div
    x-data="{ __dropdownMenuOpen: @js($open) }"
    x-modelable="__dropdownMenuOpen"
    data-slot="dropdown-menu"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
