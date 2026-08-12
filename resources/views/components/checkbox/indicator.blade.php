@blaze
@aware(['checked' => false])
<span
    @if (! $checked) x-cloak @endif
    x-checkbox-indicator
    data-slot="checkbox-indicator"
    data-state="{{ $checked ? 'checked' : 'unchecked' }}"
    {{ $attributes->tailwindMerge('grid place-content-center text-current transition-none [&>svg]:size-3.5') }}
>
    {{ $slot }}
</span>
