@blaze
@props([
    'side' => 'bottom',
    'align' => 'end',
])
<div {{
    $attributes
        ->merge([
            'data-slot' => 'bubble-reactions',
            'data-side' => $side,
            'data-align' => $align,
        ])
        ->tailwindMerge(
            'absolute z-10 flex w-fit items-center justify-center rounded-full ring-3 ring-card bg-muted shrink-0 gap-1 px-1.5 py-0.5 has-[button]:p-0 text-sm',
            $side === 'top' ? 'top-0 -translate-y-3/4' : 'bottom-0 translate-y-3/4',
            $align === 'start' ? 'start-3' : 'end-3',
        )
}}>
    {{ $slot }}
</div>
