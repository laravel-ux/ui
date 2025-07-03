<div
    x-data="{show: false}"
    data-slot="tooltip"
    {{ $attributes->tailwindMerge(['class' => 'inline-block']) }}
>
    {{ $slot }}
</div>
