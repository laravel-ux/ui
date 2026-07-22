@blaze
<div
    data-slot="message-group"
    {{ $attributes->tailwindMerge('flex w-full flex-col gap-2') }}
>
    {{ $slot }}
</div>
