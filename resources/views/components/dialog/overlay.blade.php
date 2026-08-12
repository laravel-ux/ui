@blaze
<div
    x-cloak
    x-dialog-overlay
    data-slot="dialog-overlay"
    aria-hidden="true"
    {{ $attributes->tailwindMerge('fixed inset-0 isolate z-50 bg-black/10 duration-100 supports-backdrop-filter:backdrop-blur-xs data-open:animate-in data-open:fade-in-0 data-closed:animate-out data-closed:fade-out-0') }}
>
    {{ $slot }}
</div>
