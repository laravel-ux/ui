@blaze
<div
    x-data
    x-avatar
    data-slot="avatar"
    {{ $attributes->tailwindMerge('relative flex size-8 shrink-0 overflow-hidden rounded-full') }}
>
    {{ $slot }}
</div>
