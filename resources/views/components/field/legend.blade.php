@blaze
@props(['variant' => 'legend'])
<legend
    data-slot="field-legend"
    data-variant="{{ $variant }}"
    {{
        $attributes->tailwindMerge([
            'mb-1.5 font-medium',
            'data-[variant=legend]:text-base',
            'data-[variant=label]:text-sm',
        ])
    }}
>
    {{ $slot }}
</legend>
