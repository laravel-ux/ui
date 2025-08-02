<div
    data-slot="avatar"
    x-data="{ __avatarError: false }"
    {{ $attributes->tailwindMerge('relative flex size-8 shrink-0 overflow-hidden rounded-full') }}
>
    {{ $slot }}
</div>
