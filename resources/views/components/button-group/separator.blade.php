@blaze
@props(['orientation' => 'vertical'])
<x-ux::separator {{
    $attributes
        ->merge(['data-slot' => 'button-group-separator', 'data-orientation' => $orientation])
        ->tailwindMerge('relative self-stretch bg-input data-[orientation=horizontal]:mx-px data-[orientation=horizontal]:w-auto data-[orientation=vertical]:my-px data-[orientation=vertical]:h-auto')
}}>
    {{ $slot }}
</x-ux::separator>
