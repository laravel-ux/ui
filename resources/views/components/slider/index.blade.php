@blaze
@props([
    'defaultValue' => null,
    'value' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'orientation' => 'horizontal',
    'disabled' => false,
    'name' => null,
])
@php
    $initialValue = $value ?? $defaultValue ?? [$min, $max];
    $initialValue = is_array($initialValue) ? array_values($initialValue) : [$initialValue];
@endphp
<div
    x-data
    x-slider
    data-slot="slider"
    data-values='@json($initialValue)'
    data-min="{{ $min }}"
    data-max="{{ $max }}"
    data-step="{{ $step }}"
    data-orientation="{{ $orientation }}"
    data-name="{{ $name }}"
    @if($orientation === 'vertical') data-vertical @else data-horizontal @endif
    @if($disabled) data-disabled @endif
    {{ $attributes->tailwindMerge('group/slider relative data-horizontal:w-full data-vertical:h-full') }}
>
    <div
        data-slot="slider-control"
        class="relative flex w-full touch-none items-center select-none data-vertical:h-full data-vertical:min-h-40 data-vertical:w-auto data-vertical:flex-col group-data-disabled/slider:opacity-50"
        x-bind:data-horizontal="__orientation === 'horizontal' || null"
        x-bind:data-vertical="__orientation === 'vertical' || null"
        x-on:pointerdown="__sliderPointerDown($event)"
    >
        <div
            data-slot="slider-track"
            class="relative grow overflow-hidden rounded-full bg-muted select-none data-horizontal:h-1 data-horizontal:w-full data-vertical:h-full data-vertical:w-1"
            x-bind:data-horizontal="__orientation === 'horizontal' || null"
            x-bind:data-vertical="__orientation === 'vertical' || null"
        >
            <div
                data-slot="slider-range"
                class="absolute bg-primary select-none data-horizontal:h-full data-vertical:w-full"
                x-bind:data-horizontal="__orientation === 'horizontal' || null"
                x-bind:data-vertical="__orientation === 'vertical' || null"
                x-bind:style="__sliderRangeStyle()"
            ></div>
        </div>

        <template x-for="(sliderValue, index) in __values" x-bind:key="index">
            <button
                type="button"
                role="slider"
                data-slot="slider-thumb"
                class="absolute block size-3 shrink-0 rounded-full border border-ring bg-white transition-[color,box-shadow] select-none after:absolute after:-inset-2 hover:ring-3 hover:ring-ring/50 focus-visible:ring-3 focus-visible:ring-ring/50 focus-visible:outline-hidden active:ring-3 active:ring-ring/50 disabled:pointer-events-none disabled:opacity-50"
                x-bind:disabled="__disabled"
                x-bind:aria-valuemin="__min"
                x-bind:aria-valuemax="__max"
                x-bind:aria-valuenow="sliderValue"
                x-bind:aria-orientation="__orientation"
                x-bind:aria-label="__sliderThumbLabel(index)"
                x-bind:style="__sliderThumbStyle(sliderValue)"
                x-on:pointerdown.stop="__sliderPointerDown($event, index)"
                x-on:keydown="__sliderKeydown($event, index)"
            ></button>
        </template>
    </div>

    @if($name)
        <template x-for="(sliderValue, index) in __values" x-bind:key="`input-${index}`">
            <input
                type="hidden"
                x-bind:name='__values.length > 1 ? @js($name . '[]') : @js($name)'
                x-bind:value="sliderValue"
            />
        </template>
    @endif
</div>
