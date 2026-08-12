@blaze
<p
    data-slot="field-description"
    {{
        $attributes->tailwindMerge([
            'text-muted-foreground text-start text-sm leading-normal font-normal group-data-[orientation=horizontal]/field:text-balance',
            'last:mt-0 nth-last-2:-mt-1 [[data-variant=legend]+&]:-mt-1.5',
            '[&>a:hover]:text-primary [&>a]:underline [&>a]:underline-offset-4',
        ])
    }}
>
    {{ $slot }}
</p>
