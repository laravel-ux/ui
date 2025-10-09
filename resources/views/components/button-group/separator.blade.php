@props(['orientation' => 'vertical'])
<x-ux::separator
    {{
        $attributes
            ->merge(['data-slot' => 'button-group-separator', 'data-orientation' => $orientation])
            ->tailwindMerge('bg-input relative !m-0 self-stretch data-[orientation=vertical]:h-auto')
    }}
>
    {{ $slot }}
</x-ux::separator>
