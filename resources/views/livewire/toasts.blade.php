<x-ui::toast.viewport>
    @foreach($messages as $key => $message)
        <x-ui::toast
            wire:key="{{ $key }}"
            :variant="$message['variant']"
        >
            <div class="grid gap-1">
                @if($message['title'])
                    <x-ui::toast.title>
                        {{ $message['title'] }}
                    </x-ui::toast.title>
                @endif

                <x-ui::toast.description>
                    {{ $message['description'] }}
                </x-ui::toast.description>
            </div>
            <x-ui::toast.close />
        </x-ui::toast>
    @endforeach
</x-ui::toast.viewport>
