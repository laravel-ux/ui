@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge([
            'data-slot' => 'sidebar-group-label',
            'data-sidebar' => 'group-label',
        ])
        ->tailwindMerge([
            'text-sidebar-foreground/70 ring-sidebar-ring flex h-8 shrink-0 items-center rounded-md px-2 text-xs font-medium outline-hidden transition-[margin,opacity] duration-200 ease-linear focus-visible:ring-2 [&>svg]:size-4 [&>svg]:shrink-0',
            'group-data-[collapsible=icon]:-mt-8 group-data-[collapsible=icon]:opacity-0',
        ]);
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
