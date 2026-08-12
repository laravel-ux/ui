@blaze
@props([
    'open' => false,
    'disabled' => false,
])
<div
    x-data
    x-collapsible
    data-slot="collapsible"
    {{
        $attributes->merge([
            'data-state' => $open ? 'open' : 'closed',
            'data-open' => $open ? '' : null,
            'data-closed' => $open ? null : '',
            'data-disabled' => $disabled ? '' : null,
        ])
    }}
>
    {{ $slot }}
</div>
