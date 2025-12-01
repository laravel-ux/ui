@blaze
<div
    data-slot="card-footer"
    {{ $attributes->tailwindMerge('flex items-center px-6 [.border-t]:pt-6') }}
>
    {{ $slot }}
</div>
