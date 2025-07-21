<x-ux::button
    {{
        $attributes->merge([
            'x-ref' => 'trigger',
            'x-on:click' => 'show = ! show',
            'data-slot' => 'dropdown-menu-trigger',
            'aria-haspopup' => 'menu',
            'x-bind:aria-expanded' => 'show',
        ])
    }}
>
    {{ $slot }}
</x-ux::button>
