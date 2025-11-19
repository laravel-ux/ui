@props([
    'length',
    'pattern' => '/^[a-zA-Z0-9]+$/',
])
<div
    x-data
    x-otp-input
    class="{{ TailwindMerge::merge(
        'flex items-center gap-2 has-disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
>
    {{ $slot }}
    <input
        type="hidden"
        data-slot="otp-input"
        readonly
        pattern="{{ $pattern }}"
        maxlength="{{ $length }}"
        {{ $attributes->except(['class']) }}
    >
</div>
