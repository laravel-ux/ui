@props(['index'])
<div
    data-slot="input-otp-slot"
    data-index="{{ $index }}"
    {{ $attributes->tailwindMerge('dark:bg-input/30 border-input data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive relative flex size-8 items-center justify-center border-y border-e text-center text-sm transition-all outline-none first:rounded-s-lg first:border-s last:rounded-e-lg data-[active=true]:z-10 data-[active=true]:ring-3') }}
>
    <span data-slot="input-otp-slot-character"></span>
    <div
        data-slot="input-otp-slot-caret"
        class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0"
    >
        <div class="animate-caret-blink bg-foreground h-4 w-px duration-1000"></div>
    </div>
</div>
