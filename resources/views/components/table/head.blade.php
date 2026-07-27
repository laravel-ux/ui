@blaze
<th
    data-slot="table-head"
    {{ $attributes->tailwindMerge('h-10 px-2 text-start align-middle font-medium whitespace-nowrap text-foreground [&:has([role=checkbox])]:pe-0') }}
>
    {{ $slot }}
</th>
