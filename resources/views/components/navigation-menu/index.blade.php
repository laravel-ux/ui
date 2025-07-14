@props([
    'viewport' => false,
])
@php
    $attributes = $attributes
        ->when(
            $viewport,
            fn($attributes) => $attributes->offsetSet('data-viewport', 'true'),
            fn($attributes) => $attributes->offsetSet('data-viewport', 'false'),
        )
        ->tailwindMerge('group/navigation-menu relative flex max-w-max flex-1 items-center justify-center');
@endphp
<nav
    {{ $attributes }}
    data-slot="navigation-menu"
>
    {{ $slot }}
    @if($viewport)
        <x-ux::navigation-menu.viewport />
    @endif
</nav>
