@props([
    'size' => 'default',
])
@php
    $size = match ($size) {
//        'sm' => 'h-9 rounded-md px-3',
//        'lg' => 'h-11 rounded-md px-8',
        default => 24,
    };
@endphp
<svg
    xmlns="http://www.w3.org/2000/svg"
    width="{{ $size }}"
    height="{{ $size }}"
    viewBox="0 0 {{ $size }} {{ $size }}"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
    class="animate-spin"
>
    <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
</svg>
