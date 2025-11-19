@props(['value' => ''])
<div
    x-data
    x-select="{{ $value }}"
    data-slot="select"
    {{ $attributes->tailwindMerge('contents') }}
>
    {{ $slot }}
</div>
