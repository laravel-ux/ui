@blaze
@props([
    'orientation' => 'horizontal',
    'decorative' => true,
])
<div
    {{
        $attributes
            ->when(
                $decorative,
                fn ($attributes) => $attributes->offsetSet('role', 'none'),
                fn ($attributes) => $attributes->merge(['role' => 'separator', 'aria-orientation' => $orientation])
            )
            ->merge(['data-slot' => 'separator', 'data-orientation' => $orientation])
            ->tailwindMerge('shrink-0 bg-border data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:w-px data-[orientation=vertical]:self-stretch')
    }}
></div>
