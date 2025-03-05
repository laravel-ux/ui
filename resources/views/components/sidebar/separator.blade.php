<x-ui::separator
    data-sidebar="separator"
    {{ $attributes->tailwindMerge('mx-2 w-auto bg-sidebar-border') }}
>
    {{ $slot }}
</x-ui::separator>
