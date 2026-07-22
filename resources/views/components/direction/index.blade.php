@blaze
@props(['direction' => 'ltr'])
<div
    x-data
    x-direction
    {{ $attributes
        ->merge([
            'dir' => $direction,
            'data-direction' => $direction,
            'data-slot' => 'direction',
        ])
        ->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
