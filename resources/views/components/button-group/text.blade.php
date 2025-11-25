@props(['asChild' => false])
@php
    $attributes = $attributes
        ->tailwindMerge("bg-muted flex items-center gap-2 rounded-md border px-4 text-sm font-medium shadow-xs [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4");
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
@endif
