@props(['value' => ''])
<div
    data-slot="tabs"
    x-data="{ __tabsValue: @js($value) }"
    x-modelable="__tabsValue"
    {{ $attributes->tailwindMerge('flex flex-col gap-2') }}
>
    {{ $slot }}
</div>
