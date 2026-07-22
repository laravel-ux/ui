<div
    data-slot="input-otp-group"
    {{ $attributes->tailwindMerge('flex items-center rounded-lg has-aria-invalid:border-destructive has-aria-invalid:ring-3 has-aria-invalid:ring-destructive/20 dark:has-aria-invalid:ring-destructive/40') }}
>
    {{ $slot }}
</div>
