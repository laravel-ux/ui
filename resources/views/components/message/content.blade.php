@blaze
<div
    data-slot="message-content"
    {{ $attributes->tailwindMerge('flex min-w-0 flex-1 flex-col gap-2.5 group-data-[align=end]/message:*:data-slot:self-end') }}
>
    {{ $slot }}
</div>
