@blaze
<div
    data-slot="sheet-header"
    {{ $attributes->tailwindMerge('flex flex-col gap-1.5 p-4') }}
>
    {{ $slot }}
</div>
