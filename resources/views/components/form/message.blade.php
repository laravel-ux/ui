@props(['name'])

@error($name)
<p {{ $attributes->merge(['class' => 'text-sm font-medium text-destructive']) }}>
    {{ $message }}
</p>
@enderror
