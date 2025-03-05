<x-ui::button
    size="icon"
    variant="ghost"
    data-sidebar="trigger"
    {{ $attributes->tailwindMerge('h-7 w-7') }}
>
    <x-ui::icon name="panel-left" />
    <span class="sr-only">Toggle Sidebar</span>
</x-ui::button>
