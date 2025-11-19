@props(['placeholder' => ''])
<span
    x-select-value="{{ $placeholder }}"
    data-slot="select-value"
    {{ $attributes->style('pointer-events:none') }}
>
    {{ $placeholder }}
</span>
