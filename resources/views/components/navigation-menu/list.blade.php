@aware(['orientation'])
@php
    $attributes = $attributes
        ->tailwindMerge('group flex flex-1 list-none items-center justify-center gap-1')
        ->merge(['data-slot' => 'navigation-menu-list', 'data-orientation' => $orientation]);
@endphp
<ul {{ $attributes }}>
    {{ $slot }}
</ul>
