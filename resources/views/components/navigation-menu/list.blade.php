<ul
    data-slot="navigation-menu-list"
    {{ $attributes->tailwindMerge('group flex flex-1 list-none items-center justify-center gap-1') }}
>
    {{ $slot }}
</ul>
