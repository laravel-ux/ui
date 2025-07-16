@props(['value' => ''])
<div
    {{ $attributes->tailwindMerge('grid gap-3') }}
    role="radiogroup"
    tabindex="0"
    data-slot="radio-group"
    x-data="{ value: @js($value) }"
>
    {{ $slot }}
</div>
