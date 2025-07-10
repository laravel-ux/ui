@aware(['value'])
<div class="flex">
    <button
        {{ $attributes->tailwindMerge('focus-visible:border-ring focus-visible:ring-ring/50 flex flex-1 items-start justify-between gap-4 rounded-md py-4 text-left text-sm font-medium transition-all outline-none hover:underline focus-visible:ring-[3px] disabled:pointer-events-none disabled:opacity-50 [&[data-state=open]>svg]:rotate-180') }}
        data-slot="accordion-trigger"
        x-on:click="active = (active !== '{{ $value }}' ? '{{ $value }}': '')"
        x-bind:data-state="active === '{{ $value}}' ? 'open' : 'closed'"
    >
        {{ $slot }}
        <x-ux::icon name="chevron-down" class="text-muted-foreground pointer-events-none size-4 shrink-0 translate-y-0.5 transition-transform duration-200" />
    </button>
</div>
