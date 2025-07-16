<span
    aria-hidden="true"
    data-slot="pagination-ellipsis"
    {{ $attributes->tailwindMerge('flex size-9 items-center justify-center') }}
>
    <x-ux::icon name="ellipsis" class="size-4" />
    <span class="sr-only">
        @lang('More pages')
    </span>
</span>
