@php
    $attributes = $attributes
        ->tailwindMerge('bg-primary/10 animate-pulse rounded-md')
        ->merge(['data-slot' => 'skeleton']);
@endphp
<div {{ $attributes }}></div>
