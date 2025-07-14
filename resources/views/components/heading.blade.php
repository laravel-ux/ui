@props(['size' => 'default'])
<div
    {{ $attributes->tailwindMerge([
        'font-semibold tracking-tight',
        match ($size) {
            'sm' => 'text-base',
            'lg' => 'text-2xl',
            'default' => 'text-xl',
        },
    ]) }}
>
    {{ $slot }}
</div>
