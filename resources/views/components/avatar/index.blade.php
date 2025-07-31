<div
    data-slot="avatar"
    x-data="{ error: false }"
    {{ $attributes->tailwindMerge('relative flex size-8 shrink-0 overflow-hidden rounded-full') }}
>
    {{ $slot }}
</div>
