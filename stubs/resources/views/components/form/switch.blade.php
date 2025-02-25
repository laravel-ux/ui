@props([
    'label' => '',
    'description' => '',
])
<x-ui::form.item>
    <div class="flex items-center space-x-2">
        <x-ui::switch {{ $attributes }} />

        @if($label)
            <x-ui::form.label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
            >
                {{ $label }}
            </x-ui::form.label>
        @endif
    </div>

    @if($description)
        <x-ui::form.description>{{ $description }}</x-ui::form.description>
    @endif

    <x-ui::form.message
        name="{{ $attributes->has('wire:model') ? $attributes->get('wire:model') : $attributes->get('name') }}"
    />
</x-ui::form.item>
