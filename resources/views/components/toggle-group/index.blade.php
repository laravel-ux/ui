@props([
    'value' => '',
    'variant' => 'default',
    'size' => 'default',
])
<div
    data-slot="toggle-group"
    role="group"
    tabindex="0"
    x-data="{ value: @js($value) }"
    x-modelable="value"
    {{ $attributes->tailwindMerge('group/toggle-group flex w-fit items-center rounded-md data-[variant=outline]:shadow-xs') }}
>
    {{ $slot }}
</div>
