@blaze
@props(['variant' => 'default'])
<div
    data-slot="item-media"
    {{ $attributes->tailwindMerge(
        'flex shrink-0 items-center justify-center gap-2 group-has-[[data-slot=item-description]]/item:self-start group-has-[[data-slot=item-description]]/item:translate-y-0.5 [&_svg]:pointer-events-none',
        match ($variant) {
            'icon' => "[&_svg:not([class*='size-'])]:size-4",
            'image' => 'size-10 overflow-hidden rounded-sm group-data-[size=sm]/item:size-8 group-data-[size=xs]/item:size-6 [&_img]:size-full [&_img]:object-cover',
            default => 'bg-transparent',
        },
    ) }}
>
    {{ $slot }}
</div>
