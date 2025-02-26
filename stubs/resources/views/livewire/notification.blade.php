<x-ui::toast.viewport>
    @foreach($messages as $key => $message)
        <x-ui::toast
            wire:key="{{ $key }}"
            :variant="$message['variant']"
            x-init="setTimeout(() => $wire.remove({{ $key }}), 5000)"
        >
            <x-ui::toast.message
                :title="$message['title']"
                :description="$message['description']"
            />
            <x-ui::toast.close wire:click="remove({{ $key }})" />
        </x-ui::toast>
    @endforeach
</x-ui::toast.viewport>
