@props([
    'variant' => 'default',
])
@php
    $attributes = $attributes
        ->class('relative w-full rounded-lg border px-4 py-3 text-sm [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg~*]:pl-7')
        ->merge([
            'class' => match ($variant) {
                'default' => 'bg-background text-foreground [&>svg]:text-foreground',
                'destructive' => 'border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive',
            },
        ]);
@endphp
<div {{ $attributes }}>
    {{ $slot }}
</div>
