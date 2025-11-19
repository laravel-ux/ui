@props(['value'])
<div
    x-select-item="{{ $value }}"
    data-slot="select-item"
    role="option"
    tabindex="-1"
    {{ $attributes->tailwindMerge("hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground [&_svg:not([class*='text-'])]:text-muted-foreground relative flex w-full cursor-default items-center gap-2 rounded-sm py-1.5 pr-8 pl-2 text-sm outline-hidden select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4 *:[span]:last:flex *:[span]:last:items-center *:[span]:last:gap-2") }}
>
    <span class="absolute right-2 flex size-3.5 items-center justify-center">
        <x-ux::select.item.indicator
            x-cloak
            x-select-item-indicator="{{ $value }}"
        >
            <x-ux::icon name="check" class="size-4" />
        </x-ux::select.item.indicator>
    </span>
    <span data-value="{{ $value }}">{{ $slot }}</span>
</div>
