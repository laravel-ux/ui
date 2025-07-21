<x-ux::button
    {{
        $attributes->merge([
            'x-ref' => 'trigger',
            'x-on:click' => 'show = true',
            'data-slot' => 'sheet-trigger',
            'aria-haspopup' => 'dialog',
            'x-bind:aria-expanded' => 'show',
        ])
    }}
>
    {{ $slot }}
</x-ux::button>
