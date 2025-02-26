@props([
    'title' => '',
    'description',
])
<div class="grid gap-1">
    @if($title)
        <x-ui::toast.title>
            {{ $title }}
        </x-ui::toast.title>
    @endif

    <x-ui::toast.description>
        {{ $description }}
    </x-ui::toast.description>
</div>
