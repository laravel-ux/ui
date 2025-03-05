@props([
    'inset' => false,
])
<div
    {{ $attributes->tailwindMerge([
        'hover:bg-accent hover:text-accent-foreground cursor-default select-none items-center gap-2 rounded-sm px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50 [&>svg]:size-4 [&>svg]:shrink-0',
        'pl-8' => $inset,
    ]) }}
>
    {{ $slot }}
</div>
