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
    x-slider="@js([
        'label' => __('Slider'),
        'minimumLabel' => __('Minimum'),
        'maximumLabel' => __('Maximum'),
    ])"
    data-slot="slider"
    data-values='@json($initialValue)'
    data-min="{{ $min }}"
    data-max="{{ $max }}"
    data-step="{{ $step }}"
    data-orientation="{{ $orientation }}"
    @if ($orientation === 'vertical') data-vertical @else data-horizontal @endif
    @if ($disabled) data-disabled @endif
    {{ $attributes->tailwindMerge('group/slider relative data-horizontal:w-full data-vertical:h-full') }}
>
    <div
        x-slider-control
        data-slot="slider-control"
        @if ($orientation === 'vertical') data-vertical @else data-horizontal @endif
        class="relative flex w-full touch-none items-center select-none group-data-disabled/slider:opacity-50 data-vertical:h-full data-vertical:min-h-40 data-vertical:w-auto data-vertical:flex-col"
    >
        <div
            data-slot="slider-track"
            @if ($orientation === 'vertical') data-vertical @else data-horizontal @endif
            class="bg-muted relative grow overflow-hidden rounded-full select-none data-horizontal:h-1 data-horizontal:w-full data-vertical:h-full data-vertical:w-1"
        >
            <div
                data-slot="slider-range"
                @if ($orientation === 'vertical') data-vertical @else data-horizontal @endif
                class="bg-primary absolute select-none data-horizontal:h-full data-vertical:w-full"
                x-bind:style="__sliderRangeStyle()"
            ></div>
        </div>

        <template x-for="(sliderValue, index) in __values" x-bind:key="index">
            <button
                type="button"
                role="slider"
                data-slot="slider-thumb"
                aria-valuemin="{{ $min }}"
                aria-valuemax="{{ $max }}"
                aria-orientation="{{ $orientation }}"
                @disabled($disabled)
                class="border-ring hover:ring-ring/50 focus-visible:ring-ring/50 active:ring-ring/50 absolute block size-3 shrink-0 rounded-full border bg-white transition-[color,box-shadow] select-none after:absolute after:-inset-2 hover:ring-3 focus-visible:ring-3 focus-visible:outline-hidden active:ring-3 disabled:pointer-events-none disabled:opacity-50"
                x-bind:aria-valuenow="sliderValue"
                x-bind:aria-label="__sliderThumbLabel(index)"
                x-bind:style="__sliderThumbStyle(sliderValue)"
                x-slider-thumb="index"
            ></button>
        </template>
    </div>

    @if ($name)
        <template x-for="(sliderValue, index) in __values" x-bind:key="`input-${index}`">
            <input
                type="hidden"
                x-bind:name='__values.length > 1 ? @js($name.'[]') : @js($name)'
                x-bind:value="sliderValue"
            />
        </template>
    @endif
</div>
