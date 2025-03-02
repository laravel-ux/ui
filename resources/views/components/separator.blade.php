@props([
    'orientation' => 'horizontal',
])
@php
    $attributes = $attributes
        ->class('shrink-0 bg-border')
        ->merge([
            'class' => match ($orientation) {
                'vertical' => 'h-full w-[1px]',
                'horizontal' => 'h-[1px] w-full',
            },
        ]);
@endphp
<div {{ $attributes }}></div>
