<div
    role="separator"
    data-slot="input-otp-separator"
    {{ $attributes->tailwindMerge('flex items-center [&_svg:not([class*=\'size-\'])]:size-4') }}
>
    <x-ux::icon name="minus" aria-hidden="true" />
</div>
