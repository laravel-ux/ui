@props(['inset' => false])
<div
    x-dropdown-menu-sub-trigger
    data-slot="dropdown-menu-sub-trigger"
    aria-haspopup="menu"
    role="menuitem"
    tabindex="-1"
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->tailwindMerge("hover:bg-accent focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground [&_svg:not([class*='text-'])]:text-muted-foreground flex cursor-default items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-hidden select-none data-[inset]:pl-8 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
>
    {{ $slot }}
    <x-ux::icon name="chevron-right" class="ml-auto size-4" />
</div>
