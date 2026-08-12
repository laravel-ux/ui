@blaze
@props(['align' => 'inline-start'])
<div
    x-input-group-addon
    role="group"
    data-slot="input-group-addon"
    {{
        $attributes
            ->merge(['data-align' => $align])
            ->tailwindMerge([
                "text-muted-foreground flex h-auto cursor-text items-center justify-center gap-2 py-1.5 text-sm font-medium select-none [&>svg:not([class*='size-'])]:size-4 [&>kbd]:rounded-[calc(var(--radius)-5px)] group-data-[disabled=true]/input-group:opacity-50",
                match ($align) {
                    'block-start' => 'order-first w-full justify-start px-2.5 pt-2 [.border-b]:pb-2 group-has-[>input]/input-group:pt-2',
                    'block-end' => 'order-last w-full justify-start px-2.5 pb-2 [.border-t]:pt-2 group-has-[>input]/input-group:pb-2',
                    'inline-end' => 'order-last pe-2 has-[>button]:-me-[0.3rem] has-[>kbd]:-me-[0.15rem]',
                    default => 'order-first ps-2 has-[>button]:-ms-[0.3rem] has-[>kbd]:-ms-[0.15rem]',
                },
            ])
    }}
>
    {{ $slot }}
</div>
