@props([
    'orientation' => 'horizontal',
])
<div
    {{ $attributes->tailwindMerge([
        'shrink-0 bg-border',
        match ($orientation) {
            'vertical' => 'h-full w-[1px]',
            'horizontal' => 'h-[1px] w-full',
        },
    ]) }}
></div>
