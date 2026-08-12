@blaze
@props([
    'autoScroll' => false,
    'defaultScrollPosition' => 'end',
    'scrollEdgeThreshold' => 8,
    'scrollMargin' => 0,
    'scrollPreviousItemPeek' => 64,
])
<div
    x-data
    x-message-scroller-provider
    data-slot="message-scroller-provider"
    data-auto-scroll="{{ $autoScroll ? 'true' : 'false' }}"
    data-default-scroll-position="{{ $defaultScrollPosition }}"
    data-scroll-edge-threshold="{{ $scrollEdgeThreshold }}"
    data-scroll-margin="{{ $scrollMargin }}"
    data-scroll-previous-item-peek="{{ $scrollPreviousItemPeek }}"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
