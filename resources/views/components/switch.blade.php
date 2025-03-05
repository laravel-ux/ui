<label
    role="switch"
    class="{{ TailwindMerge::merge([
        'inline-flex h-5 w-9 shrink-0 cursor-pointer items-center rounded-full border-2 border-transparent shadow-sm transition-colors focus-within:outline-none focus-within:ring-0 focus-within:ring-ring focus-within:ring-offset-2 focus-within:ring-offset-background disabled:cursor-not-allowed disabled:opacity-50 has-[:checked]:bg-primary bg-input',
        $attributes->get('class'),
    ]) }}"
>
    <input
        type="checkbox"
        class="peer sr-only"
        {{ $attributes->except('class') }}
    />
    <span class="pointer-events-none block h-4 w-4 rounded-full bg-background shadow-lg ring-0 transition-transform peer-checked:translate-x-4 peer-unchecked:translate-x-0"></span>
</label>
