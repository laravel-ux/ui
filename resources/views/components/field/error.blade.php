@blaze
<div
    role="alert"
    data-slot="field-error"
    {{ $attributes->tailwindMerge('text-destructive text-sm font-normal') }}
>
    {{ $slot }}
</div>
