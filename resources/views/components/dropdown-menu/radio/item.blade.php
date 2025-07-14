@props([
    'value' => '',
    'disabled' => false,
])
<div
    {{ $attributes
        ->when($disabled, fn($attributes) => $attributes->offsetSet('data-disabled', 'true'))
        ->tailwindMerge("hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground relative flex cursor-default items-center gap-2 rounded-sm py-1.5 pr-2 pl-8 text-sm outline-hidden select-none data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
    data-slot="dropdown-menu-radio-item"
    role="menuitemradio"
    tabindex="-1"
    x-on:click="value = (value !== '{{ $value }}' ? '{{ $value }}': '')"
    x-bind:aria-checked="value === '{{ $value }}'"
>
    <span
        class="pointer-events-none absolute left-2 flex size-3.5 items-center justify-center"
        x-show="value === '{{ $value }}'"
    >
        <x-ux::icon name="circle" class="size-2 fill-current" />
    </span>
    {{ $slot }}
</div>
