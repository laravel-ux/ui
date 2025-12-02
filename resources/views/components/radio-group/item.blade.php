@blaze
@props(['value'])
<button
    type="button"
    role="radio"
    tabindex="0"
    data-slot="radio-group-item"
    x-cloak
    x-radio-group-item
    {{
        $attributes
            ->merge(['data-value' => $value])
            ->tailwindMerge(['border-input text-primary focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 aspect-square size-4 shrink-0 rounded-full border shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50'])
    }}
>
    <x-ux::radio-group.indicator>
        <x-ux::icon name="circle" class="fill-primary absolute top-1/2 left-1/2 size-2 -translate-x-1/2 -translate-y-1/2" />
    </x-ux::radio-group.indicator>
</button>
