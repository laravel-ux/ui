<div
    x-data="{ __hoverCardOpen: false }"
    x-modelable="__hoverCardOpen"
    data-slot="hover-card"
    {{ $attributes->tailwindMerge('flex') }}
>
    {{ $slot }}
</div>
