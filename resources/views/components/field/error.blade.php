@blaze
@props(['errors' => []])
@php
    $messages = collect($errors)
        ->map(fn ($error) => is_string($error) ? $error : data_get($error, 'message'))
        ->filter()
        ->unique()
        ->values();
@endphp
@if ($slot->isNotEmpty() || $messages->isNotEmpty())
    <div role="alert" data-slot="field-error" {{ $attributes->tailwindMerge('text-destructive text-sm font-normal') }}>
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @elseif ($messages->count() === 1)
            {{ $messages->first() }}
        @else
            <ul class="ms-4 flex list-disc flex-col gap-1">
                @foreach ($messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endif
