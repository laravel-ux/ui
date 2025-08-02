@props(['value' => ''])
<div
    role="radiogroup"
    tabindex="0"
    data-slot="radio-group"
    x-data="{ __radioGroupValue: @js($value) }"
    x-modelable="__radioGroupValue"
    {{ $attributes->tailwindMerge('grid gap-3') }}
>
    {{ $slot }}
</div>
