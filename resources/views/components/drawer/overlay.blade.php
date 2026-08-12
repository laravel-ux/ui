@blaze
<div
    x-cloak
    x-show="__isOpen && __modal === true"
    x-drawer-overlay
    data-slot="drawer-overlay"
    aria-hidden="true"
    {{ $attributes->tailwindMerge('fixed inset-0 z-50 min-h-dvh select-none bg-black/10 opacity-[max(var(--drawer-overlay-min-opacity,0),calc(1-var(--drawer-swipe-progress,0)))] transition-opacity duration-450 ease-[cubic-bezier(0.32,0.72,0,1)] data-[state=closed]:pointer-events-none data-[state=closed]:opacity-0 data-snap-points:[--drawer-overlay-min-opacity:0.5] supports-[-webkit-touch-callout:none]:absolute supports-backdrop-filter:backdrop-blur-xs') }}
></div>
