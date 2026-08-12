@blaze
@props(['placeholder' => ''])
<span
    x-select-value
    data-placeholder="{{ $placeholder }}"
    data-slot="select-value"
    {{ $attributes->tailwindMerge('flex flex-1 text-start') }}
>
    {{ $placeholder }}
</span>
