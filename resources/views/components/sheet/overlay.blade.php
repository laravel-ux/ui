<div
    aria-hidden="true"
    data-slot="sheet-overlay"
    x-cloak
    x-show="open"
    x-on:click="open = false"
    x-bind:data-state="open ? 'open' : 'closed'"
    {{ $attributes->tailwindMerge('data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 fixed inset-0 z-50 bg-black/50') }}
>
    {{ $slot }}
</div>
