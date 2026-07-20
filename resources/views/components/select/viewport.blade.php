<div
    role="presentation"
    {{
        $attributes
            ->style('position: relative; flex: 1 1 0%; overflow: auto;')
            ->tailwindMerge('p-1 h-[var(--select-trigger-height)] w-full min-w-[var(--select-trigger-width)] scroll-my-1')
    }}
>
    {{ $slot }}
</div>
