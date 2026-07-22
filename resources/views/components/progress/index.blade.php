@blaze
@props(['value' => 0])
@php($value = max(0, min(100, (float) $value)))
<div
    role="progressbar"
    aria-valuemin="0"
    aria-valuemax="100"
    aria-valuenow="{{ $value }}"
    data-value="{{ $value }}"
    data-slot="progress"
    {{ $attributes->tailwindMerge('relative flex h-1 w-full items-center overflow-x-hidden rounded-full bg-muted') }}
>
    <x-ux::progress.indicator />
</div>
