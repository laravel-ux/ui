<div
    {{ $attributes->tailwindMerge('flex items-center px-6 [.border-t]:pt-6') }}
    data-slot="card-footer"
>
    {{ $slot }}
</div>
