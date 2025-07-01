<x-ux::button
    size="icon"
    variant="ghost"
    data-sidebar="trigger"
    data-slot="sidebar-trigger"
    {{ $attributes->tailwindMerge('h-7 w-7') }}
>
    <x-ux::icon name="panel-left" />
    <span class="sr-only">Toggle Sidebar</span>
</x-ux::button>
