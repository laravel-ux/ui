@props([
    'open' => true,
    'width' => '16rem',
    'widthIcon' => '3rem',
    'widthMobile' => '18rem',
])
<div
    x-data
    x-sidebar-provider="@js($open)"
    data-slot="sidebar-wrapper"
    {{
        $attributes
            ->tailwindMerge('group/sidebar-wrapper has-data-[variant=inset]:bg-sidebar flex min-h-svh w-full')
            ->style([
                "--sidebar-width: {$width}",
                "--sidebar-width-icon: {$widthIcon}",
                "--sidebar-width-mobile: {$widthMobile}",
            ])
    }}
>
    {{ $slot }}
</div>
