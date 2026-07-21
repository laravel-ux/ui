@blaze
@props([
    'src',
    'alt' => '',
])
<img
    x-cloak
    x-avatar-image
    src="{{ $src }}"
    alt="{{ $alt }}"
    data-slot="avatar-image"
    {{ $attributes->tailwindMerge('aspect-square size-full rounded-full object-cover') }}
/>
