@props(['index'])
<div
    data-slot="otp-input-slot"
    data-index="{{ $index }}"
    {{ $attributes->tailwindMerge('text-center data-[active=true]:border-ring data-[active=true]:ring-ring/50 data-[active=true]:aria-invalid:ring-destructive/20 dark:data-[active=true]:aria-invalid:ring-destructive/40 aria-invalid:border-destructive data-[active=true]:aria-invalid:border-destructive dark:bg-input/30 border-input relative flex h-9 w-9 items-center justify-center border-y border-r text-sm shadow-xs transition-all outline-none first:rounded-l-md first:border-l last:rounded-r-md data-[active=true]:z-10 data-[active=true]:ring-[3px]') }}
>
    <div data-slot="otp-input-slot-caret" class="pointer-events-none absolute inset-0 flex items-center justify-center opacity-0">
        <div class="animate-caret-blink bg-foreground h-4 w-px duration-1000"></div>
    </div>
</div>
