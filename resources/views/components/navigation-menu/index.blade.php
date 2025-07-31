<nav
    data-slot="navigation-menu"
    {{ $attributes->tailwindMerge('group/navigation-menu relative flex max-w-max flex-1 items-center justify-center') }}
>
    {{ $slot }}
</nav>
