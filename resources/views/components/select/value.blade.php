@props(['placeholder' => ''])
<span
    data-slot="select-value"
    x-text="__selectLabel || '{{ $placeholder }}'"
    {{ $attributes->style('pointer-events:none') }}
>
    {{ $placeholder }}
</span>
