@blaze
@props(['variant' => 'default'])
<div
    data-slot="empty-icon"
    {{
        $attributes
            ->merge(['data-variant' => $variant])
            ->tailwindMerge([
                'flex shrink-0 items-center justify-center mb-2 [&_svg]:pointer-events-none [&_svg]:shrink-0',
                match ($variant) {
                    'icon' => "bg-muted text-foreground flex size-8 shrink-0 items-center justify-center rounded-lg [&_svg:not([class*='size-'])]:size-4",
                    default => 'bg-transparent',
                },
            ])
    }}
>
    {{ $slot }}
</div>
