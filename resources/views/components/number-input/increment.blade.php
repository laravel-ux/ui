@blaze
@aware(['disabled' => false])
<x-ux::button
    variant="outline"
    x-number-input-increment
    data-slot="number-input-increment"
    {{ $attributes->merge(['disabled' => $disabled]) }}
>
    <x-ux::icon name="plus" />
</x-ux::button>
