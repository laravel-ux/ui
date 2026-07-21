@blaze
@props([
    'value' => '',
    'inset' => false,
    'disabled' => false,
])
<div
    x-dropdown-menu-radio-group-item="{{ $value }}"
    data-slot="dropdown-menu-radio-item"
    role="menuitemradio"
    tabindex="-1"
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->when($disabled, fn($attributes) => $attributes->offsetSet('data-disabled', 'true'))
        ->when($disabled, fn($attributes) => $attributes->offsetSet('aria-disabled', 'true'))
        ->tailwindMerge("relative flex cursor-default items-center gap-1.5 rounded-md py-1 pr-8 pl-1.5 text-sm outline-hidden select-none focus:bg-accent focus:text-accent-foreground focus:**:text-accent-foreground data-[inset]:pl-7 data-disabled:pointer-events-none data-disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
>
    <span
        x-dropdown-menu-radio-group-item-indicator="{{ $value }}"
        class="pointer-events-none absolute right-2 flex items-center justify-center"
    >
        <x-ux::icon name="check" />
    </span>
    {{ $slot }}
</div>
