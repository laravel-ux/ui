<x-ux::button
    {{
        $attributes->merge([
            'x-on:click' => 'show = false',
            'data-slot' => 'dialog-close',
        ])
    }}
>
    {{ $slot }}
</x-ux::button>
