@blaze
@props([
    'value',
    'disabled' => false,
])
<div
    x-accordion-item
    data-slot="accordion-item"
    {{
        $attributes
            ->merge(['data-value' => $value])
            ->when($disabled, fn ($attributes) => $attributes->merge(['data-disabled' => 'true']))
            ->tailwindMerge('border-b last:border-b-0')
    }}
>
    {{ $slot }}
</div>
