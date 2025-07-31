@props(['value'])
<div
    data-slot="tabs-content"
    role="tabpanel"
    tabindex="0"
    x-cloak
    x-show="value === @js($value)"
    {{ $attributes->tailwindMerge('outline-none') }}
>
    {{ $slot }}
</div>
