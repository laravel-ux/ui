@aware(['value'])
<div
    data-slot="accordion-content"
    x-cloak
    x-show="active === '{{ $value }}'"
    x-bind:data-state="active === '{{ $value}}' ? 'open' : 'closed'"
    class="data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down overflow-hidden text-sm"
>
    <div
        {{ $attributes->tailwindMerge('pt-0 pb-4') }}
    >
        {{ $slot }}
    </div>
</div>
