@props([
    'width' => '16rem',
    'widthIcon' => '3rem',
])
<div
    {{
        $attributes
            ->tailwindMerge('group/sidebar-wrapper flex min-h-svh w-full has-[[data-variant=inset]]:bg-sidebar')
            ->style([
                "--sidebar-width: {$width}",
                "--sidebar-width-icon: {$widthIcon}",
            ])
    }}
>
    {{ $slot }}
</div>
