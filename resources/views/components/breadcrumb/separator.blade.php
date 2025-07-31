<li
    role="presentation"
    aria-hidden="true"
    data-slot="breadcrumb-separator"
    {{ $attributes->tailwindMerge('[&>svg]:size-3.5') }}
>
    @if($slot->isNotEmpty())
        {{ $slot }}
    @else
        <x-ux::icon name="chevron-right" />
    @endif
</li>
