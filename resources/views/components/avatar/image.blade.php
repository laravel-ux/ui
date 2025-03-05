@props(['src', 'alt' => ''])
<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    {{ $attributes->tailwindMerge('aspect-square h-full w-full') }}
/>
