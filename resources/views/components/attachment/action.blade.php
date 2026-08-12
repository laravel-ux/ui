@blaze
@props([
    'variant' => 'ghost',
    'size' => 'icon-xs',
])
<x-ux::button :$variant :$size {{ $attributes->merge(['data-slot' => 'attachment-action']) }}>
    {{ $slot }}
</x-ux::button>
