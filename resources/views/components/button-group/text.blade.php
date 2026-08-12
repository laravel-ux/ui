@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge(['data-slot' => 'button-group-text'])
        ->tailwindMerge("flex items-center gap-2 rounded-lg border bg-muted px-2.5 text-sm font-medium [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4");
@endphp
@if ($asChild)
    <x-ux::as-child {{ $attributes }}> {{ $slot }} </x-ux::as-child>
@else
    <div {{ $attributes }}>{{ $slot }}</div>
@endif
