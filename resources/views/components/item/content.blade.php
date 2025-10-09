<div
    data-slot="item-content"
    {{ $attributes->tailwindMerge('flex flex-1 flex-col gap-1 [&+[data-slot=item-content]]:flex-none') }}
>
    {{ $slot }}
</div>
