@props([
    'type' => 'single',
    'value' => null,
    'defaultValue' => null,
    'variant' => 'default',
    'size' => 'default',
    'spacing' => 2,
    'orientation' => 'horizontal',
    'disabled' => false,
])
@php
    $initialValue = $value ?? $defaultValue;
    $serializedValue = is_array($initialValue)
        ? json_encode(array_values($initialValue))
        : $initialValue;
@endphp
<div
    x-data
    x-toggle-group
    data-slot="toggle-group"
    role="group"
    {{
        $attributes
            ->merge([
                'data-type' => $type,
                'data-size' => $size,
                'data-variant' => $variant,
                'data-spacing' => $spacing,
                'data-orientation' => $orientation,
                'data-value' => $serializedValue,
            ])
            ->style(["--gap: {$spacing}"])
            ->tailwindMerge('group/toggle-group flex w-fit flex-row items-center gap-[--spacing(var(--gap))] rounded-lg data-[size=sm]:rounded-[min(var(--radius-md),10px)] data-vertical:flex-col data-vertical:items-stretch')
    }}
>
    {{ $slot }}
</div>
