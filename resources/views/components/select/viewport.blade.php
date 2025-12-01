<div
    role="presentation"
    {{
        $attributes
            ->style('position: relative; flex: 1 1 0%; overflow: auto;')
            ->tailwindMerge('p-1 w-full scroll-my-1')
    }}
>
    {{ $slot }}
</div>
