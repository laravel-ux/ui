@props([
    'length',
    'pattern' => '/^[a-zA-Z0-9]+$/',
])
<div
    x-data
    x-otp-input-container
    class="{{ TailwindMerge::merge(
        'flex items-center gap-2 has-disabled:opacity-50 relative cursor-text select-none pointer-events-none',
        $attributes->get('class'),
    ) }}"
>
    {{ $slot }}
    <div class="absolute inset-0 pointer-events-none">
        <input
            x-otp-input
            data-slot="otp-input"
            pattern="{{ $pattern }}"
            maxlength="{{ $length }}"
            class="disabled:cursor-not-allowed absolute inset-0 flex text-left opacity-100 text-transparent pointer-events-auto bg-transparent caret-transparent border-0 border-transparent outline-none shadow-none leading-none"
            style="width: calc(100% + 40px); font-size: var(--otp-input-container-height); letter-spacing: -0.5em; clip-path: inset(0px 40px 0px 0px);"
            {{ $attributes->except(['class']) }}
        >
    </div>
</div>
