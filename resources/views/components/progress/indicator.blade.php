@blaze
@aware(['value' => 0])
<div
    data-slot="progress-indicator"
    {{
        $attributes
            ->style('transform:translateX(-' .(100 - $value). '%)')
            ->tailwindMerge('bg-primary h-full w-full flex-1 transition-all')
    }}
>
</div>

