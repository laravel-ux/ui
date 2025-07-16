@props(['name' => ''])
<div
    {{ $attributes->tailwindMerge('grid gap-2') }}
    data-slot="form-item"
>
    {{ $slot }}
</div>
