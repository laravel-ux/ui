<div
    data-slot="dialog-footer"
    {{ $attributes->tailwindMerge('flex flex-col-reverse gap-2 sm:flex-row sm:justify-end') }}
>
    {{ $slot }}
</div>
