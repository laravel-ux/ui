@blaze
@props([
    'size' => 'default',
    'disabled' => false,
])
<button
    type="button"
    x-select-trigger
    data-slot="select-trigger"
    role="combobox"
    aria-autocomplete="none"
    {{
        $attributes
            ->merge(['data-size' => $size, 'disabled' => $disabled])
            ->tailwindMerge("flex w-fit items-center justify-between gap-1.5 rounded-lg border border-input bg-transparent py-2 pe-2 ps-2.5 text-sm whitespace-nowrap transition-colors outline-none select-none data-[placeholder]:text-muted-foreground focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:border-destructive aria-invalid:ring-3 aria-invalid:ring-destructive/20 dark:bg-input/30 dark:hover:bg-input/50 dark:aria-invalid:border-destructive/50 dark:aria-invalid:ring-destructive/40 data-[size=default]:h-8 data-[size=sm]:h-7 data-[size=sm]:rounded-[min(var(--radius-md),10px)] *:data-[slot=select-value]:line-clamp-1 *:data-[slot=select-value]:flex *:data-[slot=select-value]:items-center *:data-[slot=select-value]:gap-1.5 [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4")
    }}
>
    {{ $slot }}
    <x-ux::icon name="chevron-down" class="text-muted-foreground size-4" aria-hidden="true" />
</button>
