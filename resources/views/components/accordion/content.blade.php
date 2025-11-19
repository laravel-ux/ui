@aware(['value'])
<div
    x-cloak
    x-collapse
    x-accordion-content="{{ $value }}"
    data-slot="accordion-content"
    role="region"
    class="overflow-hidden text-sm"
>
    <div {{ $attributes->tailwindMerge('pt-0 pb-4') }}>
        {{ $slot }}
    </div>
</div>
