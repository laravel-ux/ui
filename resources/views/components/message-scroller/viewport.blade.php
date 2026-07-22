@blaze
@props(['preserveScrollOnPrepend' => true])
<div
    x-message-scroller-viewport
    data-slot="message-scroller-viewport"
    data-preserve-scroll-on-prepend="{{ $preserveScrollOnPrepend ? 'true' : 'false' }}"
    role="region"
    aria-label="Messages"
    tabindex="0"
    {{ $attributes->tailwindMerge('flex min-h-0 flex-1 flex-col overflow-y-auto overscroll-contain outline-none focus-visible:ring-2 focus-visible:ring-ring/50') }}
>
    {{ $slot }}
</div>
