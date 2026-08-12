@blaze
@props(['size' => 'default'])
<div
    x-data
    x-avatar
    data-slot="avatar"
    {{
        $attributes
            ->merge(['data-size' => $size])
            ->tailwindMerge('group/avatar relative flex size-8 shrink-0 rounded-full select-none after:absolute after:inset-0 after:rounded-full after:border after:border-border after:mix-blend-darken data-[size=lg]:size-10 data-[size=sm]:size-6 dark:after:mix-blend-lighten')
    }}
>
    {{ $slot }}
</div>
