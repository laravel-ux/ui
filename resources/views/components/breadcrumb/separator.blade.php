<li
    {{ $attributes->tailwindMerge('[&>svg]:size-3.5') }}
    role="presentation"
    aria-hidden="true"
    data-slot="breadcrumb-separator"
>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-ux::icon name="chevron-right" />
    @endif
</li>
