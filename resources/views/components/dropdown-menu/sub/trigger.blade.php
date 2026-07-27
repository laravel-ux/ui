@blaze
@props(['inset' => false])
<div
    x-dropdown-menu-sub-trigger
    data-slot="dropdown-menu-sub-trigger"
    aria-haspopup="menu"
    role="menuitem"
    tabindex="-1"
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->tailwindMerge("flex cursor-default items-center gap-1.5 rounded-md px-1.5 py-1 text-sm outline-hidden select-none focus:bg-accent focus:text-accent-foreground focus:**:text-accent-foreground data-[inset]:ps-7 data-popup-open:bg-accent data-popup-open:text-accent-foreground data-open:bg-accent data-open:text-accent-foreground [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
>
    {{ $slot }}
    <x-ux::icon name="chevron-right" class="ms-auto rtl:rotate-180" aria-hidden="true" />
</div>
