@props([
    'src',
    'alt' => '',
])
<img
    x-data
    x-cloak
    x-avatar-image
    src="{{ $src }}"
    alt="{{ $alt }}"
    data-slot="avatar-image"
    {{ $attributes->tailwindMerge('aspect-square size-full') }}
/>
