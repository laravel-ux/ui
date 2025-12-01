@blaze
@props(['open' => false])
<div
    x-data
    x-collapsible
    data-slot="collapsible"
    {{ $attributes->when($open, fn($attributes) => $attributes->offsetSet('aria-expanded', 'true')) }}
>
    {{ $slot }}
</div>
