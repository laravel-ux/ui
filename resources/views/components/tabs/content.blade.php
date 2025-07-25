@props([
    'value',
])
<div
    data-slot="tabs-content"
    x-cloak
    x-show="value === '{{ $value }}'"
    role="tabpanel"
    tabindex="0"
    {{ $attributes->tailwindMerge('outline-none') }}
>
    {{ $slot }}
</div>
