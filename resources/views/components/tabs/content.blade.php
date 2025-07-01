@props(['value'])
<div
    data-slot="tabs-content"
    x-cloak
    x-show="active === '{{ $value }}'"
    {{ $attributes->tailwindMerge('flex-1 outline-none') }}
>
    {{ $slot }}
</div>
