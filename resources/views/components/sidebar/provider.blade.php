@props([
    'width' => '16rem',
    'widthIcon' => '3rem',
])
<div
    data-slot="sidebar-wrapper"
    x-data="{ show: true }"
    {{
        $attributes
            ->tailwindMerge('group/sidebar-wrapper has-data-[variant=inset]:bg-sidebar flex min-h-svh w-full')
            ->style([
                "--sidebar-width: {$width}",
                "--sidebar-width-icon: {$widthIcon}",
            ])
    }}
>
    {{ $slot }}
</div>
