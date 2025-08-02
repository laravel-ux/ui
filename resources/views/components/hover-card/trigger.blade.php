<div
    x-ref="trigger"
    x-on:mouseenter="__hoverCardOpen = true"
    x-on:mouseleave="__hoverCardOpen = false"
    data-slot="hover-card-trigger"
    aria-haspopup="menu"
    x-bind:aria-expanded="__hoverCardOpen"
    {{ $attributes }}
>
    {{ $slot }}
</div>
