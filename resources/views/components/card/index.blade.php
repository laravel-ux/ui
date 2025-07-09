<div
    {{ $attributes->tailwindMerge('bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm') }}
    data-slot="card"
>
    {{ $slot }}
</div>
