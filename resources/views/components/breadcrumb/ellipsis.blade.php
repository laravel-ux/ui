@blaze
<span
    data-slot="breadcrumb-ellipsis"
    role="presentation"
    aria-hidden="true"
    {{ $attributes->tailwindMerge('flex size-5 items-center justify-center [&>svg]:size-4') }}
>
    <x-ux::icon name="ellipsis" />
    <span class="sr-only">@lang('More')</span>
</span>
