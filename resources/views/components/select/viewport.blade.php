@blaze
<div
    role="presentation"
    {{
        $attributes
            ->tailwindMerge('w-full min-w-[var(--select-trigger-width)] p-1')
    }}
>
    {{ $slot }}
</div>
