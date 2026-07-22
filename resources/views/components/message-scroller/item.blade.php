@blaze
@props([
    'messageId' => null,
    'scrollAnchor' => false,
])
<div
    data-slot="message-scroller-item"
    @if($messageId) data-message-id="{{ $messageId }}" @endif
    data-scroll-anchor="{{ $scrollAnchor ? 'true' : 'false' }}"
    {{ $attributes->tailwindMerge('w-full [content-visibility:auto] [contain-intrinsic-size:auto_96px]') }}
>
    {{ $slot }}
</div>
