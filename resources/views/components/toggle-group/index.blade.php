@props([
    'value' => null,
    'variant' => 'default',
    'size' => 'default',
    'spacing' => 0,
    'disabled' => false,
])
<div
    x-data
    x-toggle-group
    data-slot="toggle-group"
    role="group"
    tabindex="0"
    {{
        $attributes
            ->merge([
                'data-size' => $size,
                'data-variant' => $variant,
                'data-spacing' => $spacing,
                'data-value' => $value,
            ])
            ->style(["--gap: {$spacing}"])
            ->tailwindMerge('group/toggle-group flex w-fit items-center gap-[--spacing(var(--gap))] rounded-md data-[spacing=default]:data-[variant=outline]:shadow-xs')
    }}
>
    {{ $slot }}
</div>
