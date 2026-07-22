@blaze
<div
    x-message-scroller
    data-slot="message-scroller"
    {{ $attributes->tailwindMerge('relative flex size-full min-h-0 flex-col overflow-hidden') }}
>
    {{ $slot }}
</div>
