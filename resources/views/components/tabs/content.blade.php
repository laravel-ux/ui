@blaze
@props(['value'])
<div
    x-cloak
    x-tabs-content
    data-slot="tabs-content"
    role="tabpanel"
    tabindex="0"
    {{ $attributes->merge(['data-value' => $value])->tailwindMerge('flex-1 outline-none') }}
>
    {{ $slot }}
</div>
