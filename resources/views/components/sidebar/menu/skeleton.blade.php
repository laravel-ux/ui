@props([
    'showIcon' => false,
])
<div
    data-slot="sidebar-menu-skeleton"
    data-sidebar="menu-skeleton"
    {{ $attributes->tailwindMerge('flex h-8 items-center gap-2 rounded-md px-2') }}
>
    @if($showIcon)
        <x-ui::skeleton
            class="size-4 rounded-md"
            data-sidebar="menu-skeleton-icon"
        />
    @endif
    <x-ux::skeleton
        data-sidebar="menu-skeleton-text"
        class="h-4 max-w-(--skeleton-width) flex-1"
        {{--        style="--skeleton-width: {{  }};"--}}
    />
</div>
