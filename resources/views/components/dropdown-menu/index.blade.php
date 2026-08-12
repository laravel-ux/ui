@blaze
@props(['open' => false])
<div
    x-data
    x-dropdown-menu
    data-slot="dropdown-menu"
    {{ $attributes->merge(['data-state' => $open ? 'open' : 'closed'])->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
