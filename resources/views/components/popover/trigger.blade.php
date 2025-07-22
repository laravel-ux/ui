<div
    {{
        $attributes->merge([
            'x-ref' => 'trigger',
            'x-on:click' => 'show = ! show',
            'data-slot' => 'popover-trigger',
            'aria-haspopup' => 'dialog',
            'x-bind:aria-expanded' => 'show',
        ])
    }}
>
    {{ $slot }}
</div>
