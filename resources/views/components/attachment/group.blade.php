@blaze
<div
    data-slot="attachment-group"
    {{ $attributes->tailwindMerge('flex min-w-0 scroll-fade-x snap-x snap-mandatory no-scrollbar overflow-x-auto overscroll-x-contain gap-3 scroll-px-1 py-1 *:data-[slot=attachment]:flex-none *:data-[slot=attachment]:snap-start') }}
>
    {{ $slot }}
</div>
