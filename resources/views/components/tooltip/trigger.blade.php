<div
    x-ref="trigger"
    x-on:mouseenter="show = true"
    x-on:mouseleave="show = false"
    class="inline-flex"
    data-slot="tooltip-trigger"
    x-bind:data-state="show ? 'open' : 'closed'"
>
    {{ $slot }}
</div>
