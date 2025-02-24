@props([
    'type' => 'text',
])
@php
    $attributes = $attributes
        ->class('flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm');
@endphp
<input type="{{ $type }}" {{ $attributes }} />
