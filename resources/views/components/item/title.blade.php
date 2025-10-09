<div
    data-slot="item-title"
    {{ $attributes->tailwindMerge('flex w-fit items-center gap-2 text-sm leading-snug font-medium') }}
>
    {{ $slot }}
</div>
