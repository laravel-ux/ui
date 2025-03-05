@props([
    'variant' => 'default',
])
<div
    {{ $attributes->tailwindMerge([
        'relative w-full rounded-lg border px-4 py-3 text-sm [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg~*]:pl-7',
        match ($variant) {
            'default' => 'bg-background text-foreground [&>svg]:text-foreground',
            'destructive' => 'border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive',
        },
    ]) }}
>
    {{ $slot }}
</div>
