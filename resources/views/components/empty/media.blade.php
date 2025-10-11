@props(['variant' => 'default'])
<div
    data-slot="empty-icon"
    {{
        $attributes
            ->merge(['data-variant' => $variant])
            ->tailwindMerge([
                'flex shrink-0 items-center justify-center mb-2 [&_svg]:pointer-events-none [&_svg]:shrink-0',
                match ($variant) {
                    'icon' => "bg-muted text-foreground flex size-10 shrink-0 items-center justify-center rounded-lg [&_svg:not([class*='size-'])]:size-6",
                    default => 'bg-transparent',
                },
            ])
    }}
>
    {{ $slot }}
</div>
