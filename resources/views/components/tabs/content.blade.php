@props(['value'])
<div
    x-cloak
    x-tabs-content="{{ $value }}"
    data-slot="tabs-content"
    role="tabpanel"
    tabindex="0"
    {{ $attributes->tailwindMerge('outline-none') }}
>
    {{ $slot }}
</div>
