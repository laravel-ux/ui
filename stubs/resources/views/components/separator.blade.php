@props([
    'orientation' => 'horizontal',
])
@php
    $attributes = $attributes
        ->class('shrink-0 bg-border')
        ->merge([
            'class' => match ($orientation) {
                'vertical' => 'h-full w-[1px]',
                default => 'h-[1px] w-full',
            },
        ]);
@endphp
<div {{ $attributes }}></div>
