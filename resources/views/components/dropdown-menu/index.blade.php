@props(['open' => false])
<div
    x-data
    x-dropdown-menu="{{ $open ?: '' }}"
    data-slot="dropdown-menu"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
