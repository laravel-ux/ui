<x-ux::button
    size="icon"
    variant="ghost"
    data-sidebar="trigger"
    data-slot="sidebar-trigger"
    x-sidebar-trigger
    {{ $attributes->tailwindMerge('size-7') }}
>
    <x-ux::icon name="panel-left" aria-hidden="true" />
    <span class="sr-only">@lang('Toggle Sidebar')</span>
</x-ux::button>
