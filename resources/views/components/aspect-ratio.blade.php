@props(['ratio' => 1])
<div
    class="w-full relative"
    style="padding-bottom: {{ 100 / $ratio }}%"
>
    <div data-slot="aspect-ratio" {{ $attributes->tailwindMerge('absolute inset-0') }}>
        {{ $slot }}
    </div>
</div>
