@props([
    'length',
    'pattern' => null,
])
@php
    $inputAttributes = $attributes->except(['class'])->merge([
        'inputmode' => 'numeric',
        'autocomplete' => 'one-time-code',
        'spellcheck' => 'false',
        'minlength' => $length,
        'pattern' => $pattern ? "(?:{$pattern}){{$length}}" : null,
    ]);
@endphp
<div
    x-data
    x-input-otp-container
    @if($attributes->has('dir')) dir="{{ $attributes->get('dir') }}" @endif
    class="{{ TailwindMerge::merge(
        'relative flex cursor-text items-center gap-2 has-disabled:opacity-50',
        $attributes->get('class'),
    ) }}"
>
    {{ $slot }}
    <div class="absolute inset-0 pointer-events-none">
        <input
            x-input-otp
            data-slot="input-otp"
            data-pattern="{{ $pattern }}"
            maxlength="{{ $length }}"
            class="pointer-events-auto absolute inset-0 flex border-0 border-transparent bg-transparent text-start leading-none text-transparent caret-transparent shadow-none outline-none selection:bg-transparent selection:text-transparent disabled:cursor-not-allowed"
            style="width: calc(100% + 40px); font-size: var(--input-otp-container-height); letter-spacing: -0.5em; clip-path: inset(0 40px 0 0); -webkit-text-fill-color: transparent;"
            {{ $inputAttributes }}
        >
    </div>
</div>
