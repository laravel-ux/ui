@blaze
@props(['value' => null])
<div
    x-data
    x-radio-group
    role="radiogroup"
    tabindex="0"
    data-slot="radio-group"
    {{ $attributes->merge(['data-value' => $value])->tailwindMerge('grid gap-3') }}
>
    {{ $slot }}
</div>
