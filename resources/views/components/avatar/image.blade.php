@props([
    'src',
    'alt' => '',
])
<template x-if="! error">
    <img
        {{ $attributes->tailwindMerge('aspect-square size-full') }}
        src="{{ $src }}"
        alt="{{ $alt }}"
        @@error="error = true"
        data-slot="avatar-image"
    />
</template>
