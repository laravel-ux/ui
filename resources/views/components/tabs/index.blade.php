@props([
    'value' => '',
])
<div
    data-slot="tabs"
    x-data="{ value: '{{ $value }}' }"
    {{ $attributes->tailwindMerge('flex flex-col gap-2') }}
>
    {{ $slot }}
</div>
