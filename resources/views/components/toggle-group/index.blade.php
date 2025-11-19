@props([
    'value' => '',
    'variant' => 'default',
    'size' => 'default',
])
<div
    x-data
    x-toggle-group="{{ $value }}"
    data-slot="toggle-group"
    role="group"
    tabindex="0"
    {{ $attributes->tailwindMerge('group/toggle-group flex w-fit items-center rounded-md data-[variant=outline]:shadow-xs') }}
>
    {{ $slot }}
</div>
