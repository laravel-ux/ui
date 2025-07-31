@props(['disabled' => false])
<button
    data-slot="switch"
    role="switch"
    type="button"
    x-cloak
    x-data="{ checked: @js($attributes->get('checked') ?? false) }"
    x-modelable="checked"
    x-on:click="checked = ! checked"
    x-bind:data-state="checked ? 'checked' : 'unchecked'"
    x-bind:aria-checked="checked"
    @disabled($disabled)
    class="{{ TailwindMerge::merge(
        'peer data-[state=checked]:bg-primary data-[state=unchecked]:bg-input focus-visible:border-ring focus-visible:ring-ring/50 dark:data-[state=unchecked]:bg-input/80 inline-flex h-[1.15rem] w-8 shrink-0 items-center rounded-full border border-transparent shadow-xs transition-all outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
>
    <input
        type="checkbox"
        class="peer sr-only"
        @disabled($disabled)
        {{ $attributes->except(['class', 'disabled']) }}
    />
    <span
        data-slot="switch-thumb"
        x-bind:data-state="checked ? 'checked' : 'unchecked'"
        class="bg-background dark:data-[state=unchecked]:bg-foreground dark:data-[state=checked]:bg-primary-foreground pointer-events-none block size-4 rounded-full ring-0 transition-transform data-[state=checked]:translate-x-[calc(100%-2px)] data-[state=unchecked]:translate-x-0"
    ></span>
</button>
