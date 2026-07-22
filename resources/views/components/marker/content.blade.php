@blaze
<span
    data-slot="marker-content"
    {{ $attributes->tailwindMerge('group-data-[variant=separator]/marker:flex-none group-data-[variant=separator]/marker:text-center *:[a]:underline *:[a]:underline-offset-3 *:[a]:hover:text-foreground') }}
>
    {{ $slot }}
</span>
