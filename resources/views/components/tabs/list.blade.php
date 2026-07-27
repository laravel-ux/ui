@blaze
@aware(['orientation' => 'horizontal'])
@props(['variant' => 'default'])
<div
    data-slot="tabs-list"
    data-variant="{{ $variant }}"
    role="tablist"
    @if($orientation === 'vertical') aria-orientation="vertical" @endif
    {{ $attributes->tailwindMerge([
        'group/tabs-list inline-flex w-fit items-center justify-center rounded-lg p-[3px] text-muted-foreground group-data-horizontal/tabs:h-8 group-data-vertical/tabs:h-fit group-data-vertical/tabs:flex-col data-[variant=line]:rounded-none',
        match ($variant) {
            'line' => 'gap-1 bg-transparent',
            default => 'bg-muted',
        },
    ]) }}
>
    {{ $slot }}
</div>
