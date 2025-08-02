<x-ux::button
    size="icon"
    variant="ghost"
    data-sidebar="trigger"
    data-slot="sidebar-trigger"
    x-on:click="__sidebarProviderOpen = ! __sidebarProviderOpen"
    {{ $attributes->tailwindMerge('size-7') }}
>
    <x-ux::icon name="panel-left" />
</x-ux::button>
