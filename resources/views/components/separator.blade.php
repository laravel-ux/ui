@props([
    'orientation' => 'horizontal',
    'decorative' => true,
])
<div
    {{
        $attributes
            ->when(
                $decorative,
                fn($attributes) => $attributes->offsetSet('role', 'none'),
                fn($attributes) => $attributes->merge(['role' => 'separator', 'aria-orientation' => $orientation])
            )
            ->tailwindMerge('bg-border shrink-0 data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px')
            ->merge(['data-slot' => 'separator', 'data-orientation' => $orientation])
    }}
></div>
