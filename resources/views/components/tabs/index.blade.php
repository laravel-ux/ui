@props(['active' => ''])
<div
    data-slot="tabs"
    x-data="{
        active: '{{ $active }}'
    }"
    {{ $attributes->tailwindMerge('flex flex-col gap-2') }}
>
    {{ $slot }}
</div>
