@blaze
<div
    data-slot="drawer-header"
    {{ $attributes->tailwindMerge('flex shrink-0 flex-col gap-0.5 p-4 pb-0 text-center md:gap-0.5 md:text-start group-data-[swipe-axis=x]/drawer-popup:text-start') }}
>
    {{ $slot }}
</div>
