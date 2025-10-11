@props(['value' => 0])
<div
    role="progressbar"
    aria-valuemin="0"
    aria-valuemax="100"
    data-slot="progress"
    {{ $attributes->tailwindMerge('bg-primary/20 relative h-2 w-full overflow-hidden rounded-full') }}
>
    <x-ux::progress.indicator />
</div>

