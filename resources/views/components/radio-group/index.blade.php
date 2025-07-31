@props(['value' => ''])
<div
    role="radiogroup"
    tabindex="0"
    data-slot="radio-group"
    x-data="{ value: @js($value) }"
    x-modelable="value"
    {{ $attributes->tailwindMerge('grid gap-3') }}
>
    {{ $slot }}
</div>
