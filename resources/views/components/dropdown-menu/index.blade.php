@props(['open' => false])
<div
    x-data="{ open: @js($open) }"
    x-modelable="open"
    data-slot="dropdown-menu"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
