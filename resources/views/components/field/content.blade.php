@blaze
<div
    data-slot="field-content"
    {{ $attributes->tailwindMerge('group/field-content flex flex-1 flex-col gap-0.5 leading-snug') }}
>
    {{ $slot }}
</div>
