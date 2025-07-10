@aware(['value'])
<div
    data-slot="accordion-content"
    x-cloak
    x-collapse
    x-show="active === '{{ $value }}'"
    class="overflow-hidden text-sm"
>
    <div {{ $attributes->tailwindMerge('pt-0 pb-4') }}>
        {{ $slot }}
    </div>
</div>
