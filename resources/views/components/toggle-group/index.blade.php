@props([
    'value' => '',
    'variant' => 'default',
    'size' => 'default',
])
<div
    data-slot="toggle-group"
    role="group"
    tabindex="0"
    x-data="{ __toggleGroupValue: @js($value) }"
    x-modelable="__toggleGroupValue"
    {{ $attributes->tailwindMerge('group/toggle-group flex w-fit items-center rounded-md data-[variant=outline]:shadow-xs') }}
>
    {{ $slot }}
</div>
