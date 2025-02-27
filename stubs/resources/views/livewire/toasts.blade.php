<x-ui::toast.viewport>
    @foreach($messages as $key => $message)
        <x-ui::toast
            wire:key="{{ $key }}"
            :variant="$message['variant']"
            x-data="{show: true}"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
        >
            <x-ui::toast.message
                :title="$message['title']"
                :description="$message['description']"
            />
            <x-ui::toast.close @click="show = false" />
        </x-ui::toast>
    @endforeach
</x-ui::toast.viewport>
