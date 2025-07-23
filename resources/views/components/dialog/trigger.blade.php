<div
    {{
        $attributes->merge([
            'x-ref' => 'trigger',
            'x-on:click' => 'show = ! show',
            'data-slot' => 'dialog-trigger',
            'aria-haspopup' => 'dialog',
            'x-bind:aria-expanded' => 'show',
        ])
    }}
>
    {{ $slot }}
</div>
