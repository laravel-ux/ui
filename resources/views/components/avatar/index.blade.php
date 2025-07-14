<div
    {{ $attributes->tailwindMerge('relative flex size-8 shrink-0 overflow-hidden rounded-full') }}
    data-slot="avatar"
    x-data="{ error: false }"
>
    {{ $slot }}
</div>
