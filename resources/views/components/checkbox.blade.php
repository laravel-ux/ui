@props(['disabled' => false])
<button
    role="checkbox"
    data-slot="checkbox"
    type="button"
    x-cloak
    x-data="{ checked: @js($attributes->get('checked') ?? false) }"
    x-on:click="checked = ! checked"
    x-bind:data-state="checked ? 'checked' : 'unchecked'"
    x-bind:aria-checked="checked"
    @disabled($disabled)
    class="{{ TailwindMerge::merge(
        'peer border-input dark:bg-input/30 data-[state=checked]:bg-primary data-[state=checked]:text-primary-foreground dark:data-[state=checked]:bg-primary data-[state=checked]:border-primary focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive size-4 shrink-0 rounded-[4px] border shadow-xs transition-shadow outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
>
    <input
        type="checkbox"
        class="peer sr-only"
        @disabled($disabled)
        {{ $attributes->except(['class']) }}
    />
    <span
        x-cloak
        x-show="checked"
        x-bind:data-state="checked ? 'checked' : 'unchecked'"
        data-slot="checkbox-indicator"
        class="flex items-center justify-center text-current transition-none"
    >
        <x-ux::icon name="check" class="size-3.5" />
    </span>
</button>
