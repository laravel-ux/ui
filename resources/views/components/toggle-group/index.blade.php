@props([
    'value' => '',
    'variant' => 'default',
    'size' => 'default',
])
<div
    {{ $attributes->tailwindMerge('group/toggle-group flex w-fit items-center rounded-md data-[variant=outline]:shadow-xs') }}
    role="group"
    tabindex="0"
    data-slot="toggle-group"
    x-data="{ value: @js($value) }"
>
    {{ $slot }}
</div>
