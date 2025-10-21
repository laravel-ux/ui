@props(['value' => ''])
<div
    x-data="{__selectOpen: false, __selectValue: @js($value), __selectLabel: null}"
    x-init="__selectValue && (__selectLabel = $el.querySelector(`[data-value='${__selectValue}']`)?.innerHTML)"
    x-modelable="__selectValue"
    data-slot="select"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
