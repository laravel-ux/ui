@blaze
@props(['checked' => false])
<button
    x-data
    x-cloak
    x-checkbox
    type="button"
    role="checkbox"
    data-slot="checkbox"
    {{
        $attributes
            ->merge(['data-state' => $checked ? 'checked' : 'unchecked'])
            ->tailwindMerge('peer border-input dark:bg-input/30 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground dark:data-[state=checked]:bg-primary data-[state=checked]:border-primary focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive size-4 shrink-0 rounded-[4px] border shadow-xs transition-shadow outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50')
    }}
>
    <x-ux::checkbox.indicator>
        <x-ux::icon name="check" class="size-3.5" />
    </x-ux::checkbox.indicator>
</button>
