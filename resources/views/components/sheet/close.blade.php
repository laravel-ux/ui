<x-ux::button
    {{
        $attributes->merge([
            'x-on:click' => 'show = false',
            'data-slot' => 'sheet-close',
        ])
    }}
>
    {{ $slot }}
</x-ux::button>
