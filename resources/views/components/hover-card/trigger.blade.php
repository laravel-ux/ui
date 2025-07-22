<div
    {{
        $attributes->merge([
            'x-ref' => 'trigger',
            'x-on:mouseenter' => 'show = true',
            'x-on:mouseleave' => 'show = false',
            'data-slot' => 'hover-card-trigger',
            'aria-haspopup' => 'menu',
            'x-bind:aria-expanded' => 'show',
        ])
    }}
>
    {{ $slot }}
</div>
