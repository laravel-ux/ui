@blaze
<div
    data-slot="message-scroller-content"
    role="log"
    aria-relevant="additions"
    {{ $attributes->tailwindMerge('flex min-h-full flex-col gap-6 p-4') }}
>
    {{ $slot }}
    <div data-slot="message-scroller-spacer" aria-hidden="true" class="shrink-0"></div>
</div>
