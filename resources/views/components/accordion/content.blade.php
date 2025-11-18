@aware(['value'])
<div
    x-accordion-content="{{ $value }}"
    data-slot="accordion-content"
    role="region"
    class="overflow-hidden text-sm"
>
    <div {{ $attributes->tailwindMerge('pt-0 pb-4') }}>
        {{ $slot }}
    </div>
</div>
