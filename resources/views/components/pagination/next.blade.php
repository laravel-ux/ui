<x-ux::pagination.link
    aria-label="@lang('Go to next page')"
    size="default"
    {{ $attributes->tailwindMerge('gap-1 px-2.5 sm:pr-2.5') }}
>
    <span className="hidden sm:block">
        @lang('Next')
    </span>
    <x-ux::icon name="chevron-right" />
</x-ux::pagination.link>
