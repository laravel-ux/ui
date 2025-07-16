@props(['active' => false])
<x-ux::button
    variant="{{ $active ? 'outline' : 'ghost' }}"
    data-slot="pagination-link"
    {{
        $attributes
            ->when($active, fn($attributes) => $attributes->merge(['data-active' => 'true', 'aria-current' => 'page']))
            ->merge(['size' => 'icon'])
    }}
>
    {{ $slot }}
</x-ux::button>
