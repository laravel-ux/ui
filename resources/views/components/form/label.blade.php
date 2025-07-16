@aware(['name'])
@props(['name' => ''])
<x-ux::label
    {{
        $attributes
            ->when($errors->has($name), fn($attributes) => $attributes->offsetSet('errors', 'true'))
            ->tailwindMerge('data-[error=true]:text-destructive')
    }}
>
    {{ $slot }}
</x-ux::label>
