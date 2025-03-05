@props([
    'variant' => 'default',
])
<li
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show"
    x-transition
    x-bind:data-state="show ? 'open' : 'closed'"
    {{ $attributes->tailwindMerge([
        'group pointer-events-auto relative flex w-full items-center justify-between space-x-2 overflow-hidden rounded-md border p-4 pr-6 shadow-lg transition-all data-[state=open]:animate-in data-[state=open]:slide-in-from-top-full data-[state=open]:sm:slide-in-from-bottom-full data-[state=closed]:animate-out data-[state=closed]:fade-out-80 data-[state=closed]:slide-out-to-right-full',
        match ($variant) {
            'destructive' => 'destructive group border-destructive bg-destructive text-destructive-foreground',
            'default' => 'border bg-background text-foreground',
        },
    ]) }}
>
    {{ $slot }}
</li>
