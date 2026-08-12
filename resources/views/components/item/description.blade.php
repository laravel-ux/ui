@blaze
<p
    data-slot="item-description"
    {{
        $attributes->tailwindMerge([
            'text-muted-foreground line-clamp-2 text-start text-sm leading-normal font-normal group-data-[size=xs]/item:text-xs',
            '[&>a:hover]:text-primary [&>a]:underline [&>a]:underline-offset-4',
        ])
    }}
>
    {{ $slot }}
</p>
