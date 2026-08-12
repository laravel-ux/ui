@blaze
@props(['ratio'])
<div
    data-slot="aspect-ratio"
    {{
        $attributes
            ->style(["--ratio: {$ratio}"])
            ->tailwindMerge('relative aspect-(--ratio)')
    }}
>
    {{ $slot }}
</div>
