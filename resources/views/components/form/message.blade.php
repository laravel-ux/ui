@aware(['name'])
@props(['name' => ''])
@error($name)
    <p
        {{ $attributes->tailwindMerge('text-destructive text-sm') }}
        data-slot="form-message"
    >
        {{ $message }}
    </p>
@enderror
