@props([
    'src',
    'alt' => '',
])
<template x-if="! error">
    <img
        src="{{ $src }}"
        alt="{{ $alt }}"
        @@error="error = true"
        data-slot="avatar-image"
        {{ $attributes->tailwindMerge('aspect-square size-full') }}
    />
</template>
