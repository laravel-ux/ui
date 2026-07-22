@blaze
@props(['align' => 'start'])
<div
    {{ $attributes
        ->merge([
            'data-slot' => 'message',
            'data-align' => $align,
        ])
        ->tailwindMerge('group/message flex w-full items-end gap-2 text-sm data-[align=end]:flex-row-reverse') }}
>
    {{ $slot }}
</div>
