<div
    x-ref="trigger"
    data-slot="tooltip-trigger"
    aria-haspopup="menu"
    x-on:mouseenter="__tooltipOpen = true"
    x-on:mouseleave="__tooltipOpen = false"
    {{ $attributes }}
>
    {{ $slot }}
</div>
