@props([
    'size' => 'default',
])
@php
    $attributes = $attributes
        ->class('font-semibold tracking-tight')
        ->merge([
            'class' => match ($size) {
                'sm' => 'text-base',
                'lg' => 'text-2xl',
                'default' => 'text-xl',
            },
        ]);
@endphp
<div {{ $attributes }}>
    {{ $slot }}
</div>
