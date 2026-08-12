<x-ux::button
    size="icon-sm"
    variant="ghost"
    data-sidebar="trigger"
    data-slot="sidebar-trigger"
    x-sidebar-trigger
    {{ $attributes }}
>
    <x-ux::icon name="panel-left" class="rtl:rotate-180" aria-hidden="true" />
    <span class="sr-only">@lang('Toggle Sidebar')</span>
</x-ux::button>
