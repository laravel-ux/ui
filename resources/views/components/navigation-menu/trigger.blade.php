<button
    x-ref="trigger"
    x-on:click="open = ! open"
    x-bind:aria-expanded="open"
    data-slot="navigation-menu-trigger"
    x-bind:data-state="open ? 'open' : 'closed'"
    x-bind:aria-expanded="open"
    {{ $attributes->tailwindMerge('group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground disabled:pointer-events-none disabled:opacity-50 data-[state=open]:hover:bg-accent data-[state=open]:text-accent-foreground data-[state=open]:focus:bg-accent data-[state=open]:bg-accent/50 focus-visible:ring-ring/50 outline-none transition-[color,box-shadow] focus-visible:ring-[3px] focus-visible:outline-1') }}
>
    {{ $slot }}
    <x-ux::icon name="chevron-down" class="relative top-[1px] ml-1 size-3 transition duration-300 group-data-[state=open]:rotate-180" />
</button>
