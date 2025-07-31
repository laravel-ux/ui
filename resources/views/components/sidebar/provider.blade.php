@props([
    'open' => true,
    'width' => '16rem',
    'widthIcon' => '3rem',
    'widthMobile' => '18rem',
])
<div
    x-data="{
        open: @js($open),
        isMobile: false
    }"
    x-resize.document="isMobile = $width < 768"
    data-slot="sidebar-wrapper"
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
