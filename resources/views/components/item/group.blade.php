@blaze
<div
    role="list"
    data-slot="item-group"
    {{ $attributes->tailwindMerge('group/item-group flex flex-col') }}
>
    {{ $slot }}
</div>
