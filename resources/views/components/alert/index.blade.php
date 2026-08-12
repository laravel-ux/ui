@blaze
@props(['variant' => 'default'])
<div
    role="alert"
    data-slot="alert"
    {{
        $attributes
            ->tailwindMerge([
                "group/alert relative grid w-full gap-0.5 rounded-lg border px-2.5 py-2 text-start text-sm has-data-[slot=alert-action]:relative has-data-[slot=alert-action]:pe-18 has-[>svg]:grid-cols-[auto_1fr] has-[>svg]:gap-x-2 *:[svg]:row-span-2 *:[svg]:translate-y-0.5 *:[svg]:text-current *:[svg:not([class*='size-'])]:size-4",
                match ($variant) {
                    'destructive' => 'bg-card text-destructive *:data-[slot=alert-description]:text-destructive/90 *:[svg]:text-current',
                    default => 'bg-card text-card-foreground',
                },
            ])
    }}
>
    {{ $slot }}
</div>
