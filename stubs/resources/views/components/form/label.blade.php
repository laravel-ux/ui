@php
    $attributes = $attributes
        ->class('text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70');
@endphp
<label {{ $attributes }}>
    {{ $slot }}
</label>
