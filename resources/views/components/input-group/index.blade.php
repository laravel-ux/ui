@blaze
<div
    data-slot="input-group"
    role="group"
    {{ $attributes->tailwindMerge([
        "group/input-group border-input dark:bg-input/30 relative flex h-8 w-full min-w-0 items-center rounded-lg border transition-colors outline-none has-[>textarea]:h-auto has-[:disabled]:bg-input/50 has-[:disabled]:opacity-50 dark:has-[:disabled]:bg-input/80",
        "has-[>[data-align=inline-start]]:[&>input]:ps-1.5",
        "has-[>[data-align=inline-end]]:[&>input]:pe-1.5",
        "has-[>[data-align=block-start]]:h-auto has-[>[data-align=block-start]]:flex-col has-[>[data-align=block-start]]:[&>input]:pb-3",
        "has-[>[data-align=block-end]]:h-auto has-[>[data-align=block-end]]:flex-col has-[>[data-align=block-end]]:[&>input]:pt-3",
        "has-[[data-slot=input-group-control]:focus-visible]:border-ring has-[[data-slot=input-group-control]:focus-visible]:ring-ring/50 has-[[data-slot=input-group-control]:focus-visible]:ring-3",
        "has-[[data-slot][aria-invalid=true]]:border-destructive has-[[data-slot][aria-invalid=true]]:ring-destructive/20 has-[[data-slot][aria-invalid=true]]:ring-3 dark:has-[[data-slot][aria-invalid=true]]:ring-destructive/40",
    ]) }}
>
    {{ $slot }}
</div>
