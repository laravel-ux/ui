@blaze
@props(['variant' => 'default'])
<div
    data-slot="item-media"
    {{ $attributes->tailwindMerge(
        'flex shrink-0 items-center justify-center gap-2 group-has-[[data-slot=item-description]]/item:self-start [&_svg]:pointer-events-none group-has-[[data-slot=item-description]]/item:translate-y-0.5',
        match ($variant) {
            'icon' => "size-8 border rounded-sm bg-muted [&_svg:not([class*='size-'])]:size-4",
            'image' => 'size-10 rounded-sm overflow-hidden [&_img]:size-full [&_img]:object-cover',
            default => 'bg-transparent',
        },
    ) }}
>
    {{ $slot }}
</div>
