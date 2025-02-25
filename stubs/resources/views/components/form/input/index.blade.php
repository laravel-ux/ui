@props([
    'type' => 'text',
    'label' => '',
    'description' => '',
])
<x-ui::form.item>
    @if($label)
        <x-ui::form.label>
            {{ $label }}
        </x-ui::form.label>
    @endif

    @if($description)
        <x-ui::form.description>{{ $description }}</x-ui::form.description>
    @endif

    <x-ui::input type="{{ $type }}" {{ $attributes }} />

    <x-ui::form.message
        name="{{ $attributes->has('wire:model') ? $attributes->get('wire:model') : $attributes->get('name') }}"
    />
</x-ui::form.item>
