@blaze
@aware(['value' => 0])
@php($value = max(0, min(100, (float) $value)))
<div
    data-slot="progress-indicator"
    {{
        $attributes
            ->style('transform:translateX(-' .(100 - $value). '%)')
            ->tailwindMerge('size-full flex-1 bg-primary transition-all')
    }}
>
</div>
