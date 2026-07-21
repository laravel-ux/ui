@blaze
<thead
    data-slot="table-header"
    {{ $attributes->tailwindMerge('[&_tr]:border-b') }}
>
    {{ $slot }}
</thead>
