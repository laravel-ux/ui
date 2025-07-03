<li
    data-slot="sidebar-menu-sub-item"
    data-sidebar="menu-sub-item"
    {{ $attributes->tailwindMerge('group/menu-sub-item relative') }}
>
    {{ $slot }}
</li>
