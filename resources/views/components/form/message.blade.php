@props([
    'name',
])
@error($name)
    <p {{ $attributes->tailwindMerge('text-[0.8rem] font-medium text-destructive') }}>
        {{ $message }}
    </p>
@enderror
