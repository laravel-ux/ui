@blaze
@props([
    'value' => null,
    'multiple' => false,
    'disabled' => false,
])
<div
    x-data
    x-accordion
    data-slot="accordion"
    {{
        $attributes
            ->merge(['data-value' => json_encode($value)])
            ->when($multiple, fn ($attributes) => $attributes->merge(['data-multiple' => 'true']))
            ->when($disabled, fn ($attributes) => $attributes->merge(['data-disabled' => 'true']))
    }}
>
    {{ $slot }}
</div>
