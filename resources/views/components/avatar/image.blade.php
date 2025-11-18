@props([
    'src',
    'alt' => '',
])
<img
    x-avatar-image
    src="{{ $src }}"
    alt="{{ $alt }}"
    data-slot="avatar-image"
    {{ $attributes->tailwindMerge('aspect-square size-full') }}
/>
