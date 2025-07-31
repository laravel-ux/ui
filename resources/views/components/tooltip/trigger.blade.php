<div
    x-ref="trigger"
    data-slot="tooltip-trigger"
    aria-haspopup="menu"
    x-on:mouseenter="open = true"
    x-on:mouseleave="open = false"
    {{ $attributes }}
>
    {{ $slot }}
</div>
