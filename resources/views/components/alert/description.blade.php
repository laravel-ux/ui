<div
    {{ $attributes->tailwindMerge('text-muted-foreground col-start-2 grid justify-items-start gap-1 text-sm [&_p]:leading-relaxed') }}
    data-slot="alert-description"
>
    {{ $slot }}
</div>
