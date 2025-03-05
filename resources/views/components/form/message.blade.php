@props(['name'])

@error($name)
    <p {{ $attributes->tailwindMerge('text-sm font-medium text-destructive') }}>
        {{ $message }}
    </p>
@enderror
