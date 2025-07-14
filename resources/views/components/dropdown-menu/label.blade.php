@props(['inset' => false])
<div
    {{ $attributes
        ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
        ->tailwindMerge('px-2 py-1.5 text-sm font-medium data-[inset]:pl-8')
    }}
    data-slot="dropdown-menu-label"
>
    {{ $slot }}
</div>
