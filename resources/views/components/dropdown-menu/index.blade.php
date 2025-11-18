@props(['open' => false])
<div
    x-dropdown-menu="{{ $open ?: '' }}"
    data-slot="dropdown-menu"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
