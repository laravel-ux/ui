@blaze
@props([
    'pressed' => false,
    'variant' => 'default',
    'size' => 'default',
])
@php
    $attributes = $attributes
        ->merge([
            'x-data' => '',
            'x-toggle' => '',
            'data-slot' => 'toggle',
            'data-state' => $pressed ? 'on' : 'off',
            'aria-pressed' => $pressed ? 'true' : 'false',
            'type' => 'button',
        ])
        ->tailwindMerge([
            "group/toggle inline-flex items-center justify-center whitespace-nowrap outline-none hover:bg-muted focus-visible:ring-[3px] disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:shrink-0 hover:text-foreground aria-pressed:bg-muted focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[state=on]:bg-muted gap-1 rounded-lg text-sm font-medium transition-all [&_svg:not([class*='size-'])]:size-4",
            match ($variant) {
                'outline' => 'border-input hover:bg-muted border bg-transparent',
                default => 'bg-transparent'
            },
            match ($size) {
                'sm' => "h-7 min-w-7 rounded-[min(var(--radius-md),12px)] px-2.5 text-[0.8rem] has-data-[icon=inline-end]:pr-1.5 has-data-[icon=inline-start]:pl-1.5 [&_svg:not([class*='size-'])]:size-3.5",
                'lg' => 'h-9 min-w-9 px-2.5 has-data-[icon=inline-end]:pr-2 has-data-[icon=inline-start]:pl-2',
                default => 'h-8 min-w-8 px-2.5 has-data-[icon=inline-end]:pr-2 has-data-[icon=inline-start]:pl-2',
            },
        ]);
@endphp
<button {{ $attributes }}>{{ $slot }}</button>
