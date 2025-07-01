@props([
    'type' => 'text',
])
@php($name = $attributes->hasWireModel() ? $attributes->getWireModel() : $attributes->get('name'))
<input
    type="{{ $type }}"
    {{
        $attributes
            ->when($errors->has($name), fn ($attributes) => $attributes->offsetSet('aria-invalid', 'true'))
            ->tailwindMerge([
                'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus:ring-0 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
                'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
            ])
    }}
/>
