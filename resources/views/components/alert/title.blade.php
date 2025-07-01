@php
    $attributes = $attributes
        ->tailwindMerge('col-start-2 line-clamp-1 min-h-4 font-medium tracking-tight')
        ->merge(['data-slot' => 'alert-title']);
@endphp
<h5 {{ $attributes }}>
    {{ $slot }}
</h5>
