@props(['value' => ''])
<div
    x-data
    x-radio-group="{{ $value }}"
    role="radiogroup"
    tabindex="0"
    data-slot="radio-group"
    {{ $attributes->tailwindMerge('grid gap-3') }}
>
    {{ $slot }}
</div>
