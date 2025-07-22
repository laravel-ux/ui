<div
    x-data="{ show: false }"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge(['class' => 'inline-flex']) }}
>
    {{ $slot }}
</div>
