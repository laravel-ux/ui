@props([
    'size' => 'default',
])
<div
    {{ $attributes->tailwindMerge([
        'text-muted-foreground',
        match ($size) {
            'sm' => 'text-xs',
            'lg' => 'text-base',
            'default' => 'text-sm',
        },
    ]) }}
>
    {{ $slot }}
</div>
