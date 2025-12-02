@blaze
<x-ux::pagination.link
    aria-label="@lang('Go to previous page')"
    size="default"
    {{ $attributes->tailwindMerge('gap-1 px-2.5 sm:pl-2.5') }}
>
    <x-ux::icon name="chevron-left" />
    <span className="hidden sm:block">@lang('Previous')</span>
</x-ux::pagination.link>
