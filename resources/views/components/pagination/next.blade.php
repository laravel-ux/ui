@blaze
<x-ux::pagination.link
    aria-label="@lang('Go to next page')"
    size="default"
    {{ $attributes->tailwindMerge('gap-1 px-2.5') }}
>
    <span class="hidden sm:block">{{ $slot->isEmpty() ? __('Next') : $slot }}</span>
    <x-ux::icon name="chevron-right" data-icon="inline-end" class="rtl:rotate-180" />
</x-ux::pagination.link>
