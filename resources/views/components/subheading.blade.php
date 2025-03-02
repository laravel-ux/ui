@props([
    'size' => 'default',
])
@php
    $attributes = $attributes
        ->class('text-muted-foreground')
        ->merge([
            'class' => match ($size) {
                'sm' => 'text-xs',
                'lg' => 'text-base',
                'default' => 'text-sm',
            },
        ]);
@endphp
<div {{ $attributes }}>
    {{ $slot }}
</div>
