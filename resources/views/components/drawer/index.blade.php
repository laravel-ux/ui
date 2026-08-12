@blaze
@props([
    'open' => false,
    'modal' => true,
    'showSwipeHandle' => false,
    'snapPoints' => [],
    'swipeDirection' => 'down',
    'disablePointerDismissal' => false,
])
<div
    x-data
    x-drawer
    data-slot="drawer"
    data-swipe-direction="{{ $swipeDirection }}"
    data-show-swipe-handle="{{ $showSwipeHandle ? 'true' : 'false' }}"
    data-modal="{{ is_bool($modal) ? ($modal ? 'true' : 'false') : $modal }}"
    data-snap-points='@json($snapPoints)'
    {{
        $attributes
            ->merge(['data-state' => $open ? 'open' : 'closed'])
            ->when($disablePointerDismissal, fn ($attributes) => $attributes->merge(['data-disable-pointer-dismissal' => true]))
            ->tailwindMerge('contents')
    }}
>
    {{ $slot }}
</div>
