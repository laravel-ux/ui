@props(['value' => ''])
<div
    x-data
    x-tabs="{{ $value }}"
    data-slot="tabs"
    {{ $attributes->tailwindMerge('flex flex-col gap-2') }}
>
    {{ $slot }}
</div>
