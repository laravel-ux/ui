@blaze
@aware(['value'])
<span
    x-cloak
    x-radio-group-indicator
    data-slot="radio-group-indicator"
    {{ $attributes->merge(['data-value' => $value])->tailwindMerge('flex size-4 items-center justify-center') }}
>
    {{ $slot }}
</span>
