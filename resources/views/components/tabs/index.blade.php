@blaze
@props([
    'value' => null,
    'orientation' => 'horizontal',
    'activationMode' => 'automatic',
])
<div
    x-data
    x-tabs
    data-slot="tabs"
    data-orientation="{{ $orientation }}"
    data-activation-mode="{{ $activationMode }}"
    @if($orientation === 'vertical') data-vertical @else data-horizontal @endif
    {{ $attributes->merge(['data-value' => $value])->tailwindMerge('group/tabs flex gap-2 data-horizontal:flex-col') }}
>
    {{ $slot }}
</div>
