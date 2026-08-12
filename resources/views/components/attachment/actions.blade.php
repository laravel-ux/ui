@blaze
<div
    data-slot="attachment-actions"
    {{ $attributes->tailwindMerge('flex shrink-0 items-center relative z-20 group-data-[orientation=vertical]/attachment:absolute group-data-[orientation=vertical]/attachment:top-3 group-data-[orientation=vertical]/attachment:end-3 group-data-[orientation=vertical]/attachment:gap-1') }}
>
    {{ $slot }}
</div>
