<x-ux::separator
    data-slot="sidebar-separator"
    data-sidebar="separator"
    {{ $attributes->tailwindMerge('bg-sidebar-border mx-2 w-auto') }}
>
    {{ $slot }}
</x-ux::separator>
