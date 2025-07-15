@props([
    'label' => '',
    'description' => '',
])
@php($name = $attributes->hasWireModel() ? $attributes->getWireModel() : $attributes->get('name'))
<x-ux::form.item>
    @if($label)
        <x-ux::form.label name="{{ $name }}" for="{{ $attributes->get('id') }}">
            {{ $label }}
        </x-ux::form.label>
    @endif

    <x-ux::input {{ $attributes }} />

    @if($description)
        <x-ux::form.description>{{ $description }}</x-ux::form.description>
    @endif

    <x-ux::form.message name="{{ $name }}" />
</x-ux::form.item>
