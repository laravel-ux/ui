@props([
    'viewport' => false,
    'orientation' => 'horizontal',
])
@php
    $attributes = $attributes
        ->when($viewport, fn ($attributes) => $attributes->offsetSet('data-viewport', 'true'), fn ($attributes) => $attributes->offsetSet('data-viewport', 'false'))
        ->tailwindMerge('group/navigation-menu relative flex max-w-max flex-1 items-center justify-center')
        ->merge(['data-slot' => 'navigation-menu', 'data-orientation' => $orientation]);
@endphp
<nav
    x-data="{
        show: false,
        close: function () {
            this.show = false
        },
        toggle: function () {
            this.show = ! this.show
        }
    }"
    {{ $attributes }}
>
    {{ $slot }}
</nav>
