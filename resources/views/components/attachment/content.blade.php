@blaze
<div
    data-slot="attachment-content"
    {{ $attributes->tailwindMerge('max-w-full min-w-0 flex-1 leading-tight group-data-[orientation=vertical]/attachment:px-1') }}
>
    {{ $slot }}
</div>
