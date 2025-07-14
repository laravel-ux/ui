@props([
    'columns' => 2,
])
<div
    {{ $attributes->tailwindMerge([
        'grid gap-4',
        match ($columns) {
            6 => 'grid-cols-6',
            5 => 'grid-cols-5',
            4 => 'grid-cols-4',
            3 => 'grid-cols-3',
            2 => 'grid-cols-2',
            default => 'grid-cols-1',
        },
    ]) }}
>
    {{ $slot }}
</div>
