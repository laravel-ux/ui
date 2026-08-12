@blaze
<div
    data-slot="item-content"
    {{ $attributes->tailwindMerge('flex flex-1 flex-col gap-1 group-data-[size=xs]/item:gap-0 [&+[data-slot=item-content]]:flex-none') }}
>
    {{ $slot }}
</div>
