@props([
    'src',
    'alt' => '',
])
<template x-if="! __avatarError">
    <img
        src="{{ $src }}"
        alt="{{ $alt }}"
        @@error="__avatarError = true"
        data-slot="avatar-image"
        {{ $attributes->tailwindMerge('aspect-square size-full') }}
    />
</template>
