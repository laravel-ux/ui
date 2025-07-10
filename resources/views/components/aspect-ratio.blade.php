@props(['ratio' => 1])
<div class="w-full relative aspect-[{{ $ratio }}]">
    <div {{ $attributes->tailwindMerge('absolute inset-0') }} data-slot="aspect-ratio">
        {{ $slot }}
    </div>
</div>
