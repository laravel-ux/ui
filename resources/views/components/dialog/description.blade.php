@blaze
<p
    data-slot="dialog-description"
    {{ $attributes->tailwindMerge('text-sm text-muted-foreground *:[a]:underline *:[a]:underline-offset-3 *:[a]:hover:text-foreground') }}
>
    {{ $slot }}
</p>
