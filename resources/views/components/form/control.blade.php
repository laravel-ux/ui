@aware(['name'])
@asChild(
    $attributes
        ->when($errors->has($name), fn($attributes) => $attributes->offsetSet('aria-invalid', 'true'))
        ->toArray()
)
    {{ $slot }}
@endAsChild
