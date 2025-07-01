<li
    role="presentation"
    aria-hidden="true"
    {{ $attributes->tailwindMerge('[&>svg]:w-3.5 [&>svg]:h-3.5') }}
>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-ux::icon name="chevron-right" />
    @endif
</li>
