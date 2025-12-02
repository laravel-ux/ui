@blaze
@aware(['disabled' => false])
<x-ux::button
    variant="outline"
    x-number-input-decrement
    data-slot="number-input-decrement"
    {{ $attributes->merge(['disabled' => $disabled]) }}
>
    <x-ux::icon name="minus" />
</x-ux::button>
