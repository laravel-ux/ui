@blaze
@props(['open' => false])
<div
    x-data
    x-collapsible
    data-slot="collapsible"
    {{ $attributes->merge(['data-state', $open ? 'open' : 'closed']) }}
>
    {{ $slot }}
</div>
