@props([
    'inset' => false,
])
<div
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->tailwindMerge('hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground data-[state=open]:bg-accent data-[state=open]:text-accent-foreground flex cursor-default items-center rounded-sm px-2 py-1.5 text-sm outline-hidden select-none data-[inset]:pl-8')
    }}
    x-ref="trigger"
    aria-haspopup="menu"
    role="menuitem"
    tabindex="-1"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
    x-bind:aria-expanded="show"
    data-slot="dropdown-menu-sub-trigger"
>
    {{ $slot }}
    <x-ux::icon name="chevron-right" class="ml-auto size-4" />
</div>
