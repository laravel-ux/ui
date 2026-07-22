@blaze
<div
    data-slot="item-title"
    {{ $attributes->tailwindMerge('line-clamp-1 flex w-fit items-center gap-2 text-sm leading-snug font-medium underline-offset-4') }}
>
    {{ $slot }}
</div>
