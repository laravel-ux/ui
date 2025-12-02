@blaze
@props(['value' => null])
<div
    x-data
    x-tabs
    data-slot="tabs"
    {{ $attributes->merge(['data-value' => $value])->tailwindMerge('flex flex-col gap-2') }}
>
    {{ $slot }}
</div>
