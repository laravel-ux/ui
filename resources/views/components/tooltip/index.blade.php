@blaze
@props(['delayDuration' => 0])
<div
    x-data
    x-tooltip
    data-delay-duration="{{ $delayDuration }}"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
