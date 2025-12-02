@blaze
<nav
    role="navigation"
    aria-label="pagination"
    data-slot="pagination"
    {{ $attributes->tailwindMerge('mx-auto flex w-full justify-center') }}
>
    {{ $slot }}
</nav>
