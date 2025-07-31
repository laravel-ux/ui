<div
    x-ref="trigger"
    x-on:mouseenter="open = true"
    x-on:mouseleave="open = false"
    data-slot="hover-card-trigger"
    aria-haspopup="menu"
    x-bind:aria-expanded="open"
    {{ $attributes }}
>
    {{ $slot }}
</div>
