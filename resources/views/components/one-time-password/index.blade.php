@props([
    'length',
    'pattern' => '/^[a-zA-Z0-9]+$/',
])
<div
    x-data="{ active: null, length: {{ $length }}, values: {}, pattern: {{ $pattern }}, update() { $refs.input.value = Object.values(Object.fromEntries(Object.entries(this.values).sort(([a], [b]) => a - b))).join(''); } }"
    class="{{ TailwindMerge::merge(
        'flex items-center gap-2 has-disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
>
    {{ $slot }}
    <input
        x-ref="input"
        type="hidden"
        data-slot="one-time-password"
        readonly
        maxlength="{{ $length }}"
        {{ $attributes->except(['class']) }}
    >
</div>
