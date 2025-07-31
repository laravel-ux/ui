@props(['inset' => false])
<div
    x-ref="trigger"
    aria-haspopup="menu"
    role="menuitem"
    tabindex="-1"
    x-on:mouseenter="open = true"
    x-on:mouseleave="open = false"
    x-bind:aria-expanded="open"
    data-slot="dropdown-menu-sub-trigger"
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->tailwindMerge('hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground flex cursor-default items-center rounded-sm px-2 py-1.5 text-sm outline-hidden select-none data-[inset]:pl-8')
    }}
>
    {{ $slot }}
    <x-ux::icon name="chevron-right" class="ml-auto size-4" />
</div>
