<x-ux::button-group
    x-data
    {{ $attributes->only('class') }}
>
    <x-ux::number-input.decrement />
    <x-ux::input
        x-number-input
        data-slot="number-input"
        tabindex="0"
        spellcheck="false"
        autocorrect="off"
        autocomplete="off"
        inputmode="numeric"
        class="text-center"
        {{ $attributes->except(['class']) }}
    />
    <x-ux::number-input.increment />
</x-ux::button-group>
