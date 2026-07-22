@blaze
<div
    data-slot="message-avatar"
    {{ $attributes->tailwindMerge('min-w-8 shrink-0 group-has-data-[slot=message-footer]/message:-translate-y-8') }}
>
    {{ $slot }}
</div>
