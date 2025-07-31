@props(['inset' => false])
<div
    data-slot="dropdown-menu-label"
    {{
        $attributes
            ->when($inset, fn($attributes) => $attributes->offsetSet('data-inset', 'true'))
            ->tailwindMerge('px-2 py-1.5 text-sm font-medium data-[inset]:pl-8')
    }}
>
    {{ $slot }}
</div>
