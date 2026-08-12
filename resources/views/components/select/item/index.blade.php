@blaze
@props(['value', 'disabled' => false])
<div
    x-select-item
    data-value="{{ $value }}"
    @if ($disabled) data-disabled aria-disabled="true" @endif
    data-slot="select-item"
    role="option"
    tabindex="-1"
    {{ $attributes->tailwindMerge("relative flex w-full cursor-default items-center gap-1.5 rounded-md py-1 pe-8 ps-1.5 text-sm outline-hidden select-none focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4") }}
>
    <span class="absolute end-2 flex size-3.5 items-center justify-center">
        <x-ux::select.item.indicator x-cloak x-select-item-indicator data-value="{{ $value }}">
            <x-ux::icon name="check" class="size-4" aria-hidden="true" />
        </x-ux::select.item.indicator>
    </span>
    <span data-select-item-text class="flex flex-1 gap-2">{{ $slot }}</span>
</div>
