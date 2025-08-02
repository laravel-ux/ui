@props([
    'length',
    'pattern' => '/^[a-zA-Z0-9]+$/',
])
<div
    x-data="{
        __OtpInputActive: null,
        __OtpInputValues: {},
        __OtpInputLength: @js($length),
        __OtpInputPattern: {{ $pattern }},
        __OtpInputUpdate() { $refs.input.value = Object.values(Object.fromEntries(Object.entries(this.__OtpInputValues).sort(([a], [b]) => a - b))).join(''); }
    }"
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
