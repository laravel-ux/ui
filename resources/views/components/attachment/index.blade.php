@blaze
@props([
    'state' => 'done',
    'size' => 'default',
    'orientation' => 'horizontal',
])
<div {{
    $attributes
        ->merge([
            'data-slot' => 'attachment',
            'data-state' => $state,
            'data-size' => $size,
            'data-orientation' => $orientation,
        ])
        ->tailwindMerge(
            'group/attachment relative flex max-w-full min-w-0 shrink-0 flex-wrap border bg-card text-card-foreground transition-colors has-[>a,>button]:hover:bg-muted/50 data-[state=error]:border-destructive/30 data-[state=idle]:border-dashed rounded-xl w-fit focus-within:ring-1 focus-within:ring-ring/50',
            match ($size) {
                'sm' => 'gap-2.5 has-data-[slot=attachment-content]:px-2 has-data-[slot=attachment-content]:py-1.5 has-data-[slot=attachment-media]:p-1.5 text-xs',
                'xs' => 'gap-1.5 has-data-[slot=attachment-content]:px-1.5 has-data-[slot=attachment-content]:py-1 has-data-[slot=attachment-media]:p-1 text-xs rounded-lg',
                default => 'gap-2 has-data-[slot=attachment-content]:px-2.5 has-data-[slot=attachment-content]:py-2 has-data-[slot=attachment-media]:p-2 text-sm',
            },
            match ($orientation) {
                'vertical' => 'flex-col w-24 has-data-[slot=attachment-content]:w-30',
                default => 'items-center min-w-40',
            },
        )
}}>
    {{ $slot }}
</div>
