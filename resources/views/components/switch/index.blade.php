@blaze
@props([
    'checked' => false,
    'size' => 'default',
    'name' => null,
    'value' => 'on',
    'disabled' => false,
    'form' => null,
])
<button
    x-cloak
    x-data
    x-switch
    data-slot="switch"
    role="switch"
    type="button"
    {{
        $attributes
            ->merge([
                'disabled' => $disabled,
                'data-size' => $size,
                'data-state' => $checked ? 'checked' : 'unchecked',
                'data-checked' => $checked ? '' : null,
            ])
            ->tailwindMerge('peer group/switch relative inline-flex shrink-0 items-center rounded-full border border-transparent transition-all outline-none after:absolute after:-inset-x-3 after:-inset-y-2 focus-visible:border-ring focus-visible:ring-3 focus-visible:ring-ring/50 disabled:cursor-not-allowed disabled:opacity-50 aria-invalid:border-destructive aria-invalid:ring-3 aria-invalid:ring-destructive/20 dark:aria-invalid:border-destructive/50 dark:aria-invalid:ring-destructive/40 data-[state=checked]:bg-primary data-[state=unchecked]:bg-input dark:data-[state=unchecked]:bg-input/80 data-[size=default]:h-[18.4px] data-[size=default]:w-8 data-[size=sm]:h-3.5 data-[size=sm]:w-6')
    }}
>
    <x-ux::switch.thumb />
</button>
@if($name)
    <input
        type="hidden"
        data-switch-input
        name="{{ $name }}"
        value="{{ $value }}"
        @if($form) form="{{ $form }}" @endif
        @disabled(! $checked || $disabled)
    />
@endif
