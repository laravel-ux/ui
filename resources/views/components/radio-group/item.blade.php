@props([
    'value' => '',
    'disabled' => false,
 ])
<button
    class="{{ TailwindMerge::merge(
        'border-input text-primary focus-visible:border-ring focus-visible:ring-ring/50 aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive dark:bg-input/30 aspect-square size-4 shrink-0 rounded-full border shadow-xs transition-[color,box-shadow] outline-none focus-visible:ring-[3px] disabled:cursor-not-allowed disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
    type="button"
    role="radio"
    tabindex="0"
    data-slot="radio-group-item"
    x-cloak
    x-on:click="value = (value !== '{{ $value }}' ? '{{ $value }}': '')"
    x-bind:data-state="(value === '{{ $value }}') ? 'checked' : 'unchecked'"
    x-bind:aria-checked="value === '{{ $value }}'"
    @disabled($disabled)
>
    <input
        type="radio"
        class="peer sr-only"
        @disabled($disabled)
        {{ $attributes->except(['class']) }}
    />
    <span
        x-cloak
        x-show="value === '{{ $value }}'"
        x-bind:data-state="(value === '{{ $value }}') ? 'checked' : 'unchecked'"
        data-slot="radio-group-indicator"
        class="relative flex items-center justify-center"
    >
        <x-ux::icon name="circle" class="fill-primary absolute top-1/2 left-1/2 size-2 -translate-x-1/2 -translate-y-1/2" />
    </span>
</button>
