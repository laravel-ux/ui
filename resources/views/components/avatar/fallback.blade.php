<span
    {{ $attributes->tailwindMerge('bg-muted flex size-full items-center justify-center rounded-full') }}
    data-slot="avatar-fallback"
>
    {{ $slot }}
</span>
