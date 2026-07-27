@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge([
            'data-slot' => 'sidebar-group-action',
            'data-sidebar' => 'group-action',
        ])
        ->tailwindMerge([
            'text-sidebar-foreground ring-sidebar-ring hover:bg-sidebar-accent hover:text-sidebar-accent-foreground absolute top-3.5 end-3 flex aspect-square w-5 items-center justify-center rounded-md p-0 outline-hidden transition-transform focus-visible:ring-2 [&>svg]:size-4 [&>svg]:shrink-0',
            'after:absolute after:-inset-2 md:after:hidden',
            'group-data-[collapsible=icon]:hidden',
        ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <button type="button" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif
