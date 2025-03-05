@props([
    'inset' => false,
])
<div
    {{ $attributes->tailwindMerge([
        'px-2 py-1.5 text-sm font-semibold',
        'pl-8' => $inset,
    ]) }}
>
    {{ $slot }}
</div>
