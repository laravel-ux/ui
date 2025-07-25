@aware(['variant', 'size'])
@props(['value'])
@php
    $attributes = $attributes->tailwindMerge([
        "inline-flex items-center justify-center gap-2 rounded-md text-sm font-medium hover:bg-muted hover:text-muted-foreground disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 [&_svg]:shrink-0 focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] outline-none transition-[color,box-shadow] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive whitespace-nowrap",
        'min-w-0 flex-1 shrink-0 rounded-none shadow-none first:rounded-l-md last:rounded-r-md focus:z-10 focus-visible:z-10 data-[variant=outline]:border-l-0 data-[variant=outline]:first:border-l',
        match ($variant) {
            'outline' => 'border border-input bg-transparent shadow-xs hover:bg-accent hover:text-accent-foreground',
            default => 'bg-transparent'
        },
        match ($size) {
            'sm' => 'h-8 px-1.5 min-w-8',
            'lg' => 'h-10 px-2.5 min-w-10',
            default => 'h-9 px-2 min-w-9',
        },
    ]);
@endphp
@if($attributes->has('href'))
    <a
        {{ $attributes }}
        data-slot="toggle-group-item"
        x-on:click="value = '{{ $value }}'"
        x-bind:tabindex="value === '{{ $value }}' ? 0 : -1"
        x-bind:data-state="value === '{{ $value }}' ? 'on' : 'off'"
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes }}
        data-slot="toggle-group-item"
        x-on:click="value = '{{ $value }}'"
        x-bind:tabindex="value === '{{ $value }}' ? 0 : -1"
        x-bind:data-state="value === '{{ $value }}' ? 'on' : 'off'"
    >
        {{ $slot }}
    </button>
@endif
