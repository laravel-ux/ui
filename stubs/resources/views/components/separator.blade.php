@props([
    'orientation' => 'horizontal',
])
@php
    $attributes = $attributes
        ->class('shrink-0 bg-border')
        ->merge([
            'class' => match ($orientation) {
                'horizontal' => 'h-[1px] w-full',
                'vertical' => 'h-full w-[1px]',
            },
        ]);
@endphp
<div {{ $attributes }}></div>
