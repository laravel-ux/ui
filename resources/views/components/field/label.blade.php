@props(['asChild' => false])
@php
    $attributes = $attributes
        ->merge(['data-slot' => 'field-label'])
        ->tailwindMerge([
            "group/field-label peer/field-label flex w-fit gap-2 leading-snug group-data-[disabled=true]/field:opacity-50",
            "has-[>[data-slot=field]]:w-full has-[>[data-slot=field]]:flex-col has-[>[data-slot=field]]:rounded-md has-[>[data-slot=field]]:border [&>*]:data-[slot=field]:p-4",
            "has-data-[state=checked]:bg-primary/5 has-data-[state=checked]:border-primary dark:has-data-[state=checked]:bg-primary/10",
        ]);
@endphp
@if($asChild)
    <x-ux::as-child {{ $attributes }}>
        {{ $slot }}
    </x-ux::as-child>
@else
    <x-ux::label {{ $attributes }}>
        {{ $slot }}
    </x-ux::label>
@endif
