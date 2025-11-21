@props([
    'checked' => false,
    'disabled' => false,
])
<div
    x-data
    x-dropdown-menu-checkbox-item="@js($checked)"
    data-slot="dropdown-menu-checkbox-item"
    role="menuitemcheckbox"
    tabindex="-1"
    {{ $attributes
        ->when($disabled, fn($attributes) => $attributes->offsetSet('data-disabled', 'true'))
        ->tailwindMerge("hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground relative flex cursor-default items-center gap-2 rounded-sm py-1.5 pr-2 pl-8 text-sm outline-hidden select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
>
    <span
        x-dropdown-menu-checkbox-item-indicator
        class="pointer-events-none absolute left-2 flex size-3.5 items-center justify-center"
    >
        <x-ux::icon name="check" class="size-4" />
    </span>
    {{ $slot }}
</div>
