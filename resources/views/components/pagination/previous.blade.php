@blaze
<x-ux::pagination.link
    aria-label="@lang('Go to previous page')"
    size="default"
    {{ $attributes->tailwindMerge('gap-1 px-2.5') }}
>
    <x-ux::icon name="chevron-left" data-icon="inline-start" class="rtl:rotate-180" aria-hidden="true" />
    <span class="hidden sm:block">{{ $slot->isEmpty() ? __('Previous') : $slot }}</span>
</x-ux::pagination.link>
