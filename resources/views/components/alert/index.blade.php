@props([
    'variant' => 'default',
])
@php
    $attributes = $attributes
        ->tailwindMerge([
            'relative w-full rounded-lg border px-4 py-3 text-sm grid has-[>svg]:grid-cols-[calc(var(--spacing)*4)_1fr] grid-cols-[0_1fr] has-[>svg]:gap-x-3 gap-y-0.5 items-start [&>svg]:size-4 [&>svg]:translate-y-0.5 [&>svg]:text-current',
            match ($variant) {
                'default' => 'bg-background text-foreground',
                'destructive' => 'border-destructive/50 text-destructive-foreground [&>svg]:text-current *:data-[slot=alert-description]:text-destructive-foreground/80',
            },
        ])
        ->merge(['data-slot' => 'alert']);
@endphp
<div {{ $attributes }}>
    {{ $slot }}
</div>
