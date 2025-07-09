<div
    {{ $attributes->tailwindMerge('col-start-2 row-span-2 row-start-1 self-start justify-self-end') }}
    data-slot="card-action"
>
    {{ $slot }}
</div>
