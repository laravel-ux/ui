@blaze
@props([
    'value',
    'disabled' => false,
])
<button
    type="button"
    role="radio"
    data-slot="radio-group-item"
    x-cloak
    x-radio-group-item
    {{
        $attributes
            ->merge([
                'data-value' => $value,
                'disabled' => $disabled,
            ])
            ->tailwindMerge('peer group/radio-group-item relative flex aspect-square size-4 shrink-0 rounded-full border border-input outline-none after:absolute after:-inset-x-3 after:-inset-y-2 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:border-destructive aria-invalid:ring-3 aria-invalid:ring-destructive/20 aria-invalid:aria-checked:border-primary dark:bg-input/30 dark:aria-invalid:border-destructive/50 dark:aria-invalid:ring-destructive/40 data-checked:border-primary data-checked:bg-primary data-checked:text-primary-foreground dark:data-checked:bg-primary')
    }}
>
    <x-ux::radio-group.indicator>
        <span class="absolute top-1/2 left-1/2 size-2 -translate-x-1/2 -translate-y-1/2 rounded-full bg-primary-foreground"></span>
    </x-ux::radio-group.indicator>
</button>
