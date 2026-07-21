@blaze
<div
    data-slot="alert-description"
    {{ $attributes->tailwindMerge('text-muted-foreground text-sm text-balance md:text-pretty [&_a]:underline [&_a]:underline-offset-3 [&_a]:hover:text-foreground [&_p:not(:last-child)]:mb-4') }}
>
    {{ $slot }}
</div>
