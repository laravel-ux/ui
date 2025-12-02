@blaze
@props(['checked' => false])
<button
    x-cloak
    x-data
    x-switch
    data-slot="switch"
    role="switch"
    type="button"
    {{
        $attributes
            ->merge(['data-state' => $checked ? 'checked' : 'unchecked'])
            ->tailwindMerge('peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-input focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent shadow-xs transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50')
    }}
>
    <x-ux::switch.thumb />
</button>
