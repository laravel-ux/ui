@blaze
<tbody data-slot="table-body" {{ $attributes->tailwindMerge('[&_tr:last-child]:border-0') }}>
    {{ $slot }}
</tbody>
