@props([
    'label' => '',
    'description' => '',
])
<x-ux::form.item>
    <div class="flex items-center space-x-2">
        <x-ux::checkbox {{ $attributes }} />

        @if($label)
            <x-ux::form.label
                for="{{ $attributes->get('id') }}"
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
            >
                {{ $label }}
            </x-ux::form.label>
        @endif
    </div>

    @if($description)
        <x-ux::form.description>{{ $description }}</x-ux::form.description>
    @endif

    <x-ux::form.message
        name="{{ $attributes->hasWireModel() ? $attributes->getWireModel() : $attributes->get('name') }}"
    />
</x-ux::form.item>
