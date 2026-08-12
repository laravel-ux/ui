# Toast

A succinct message that is displayed temporarily.

```blade preview
<div x-data>
    <x-ux::button
        variant="outline"
        x-on:click="$dispatch('toast', {
            title: 'Event created',
            description: 'Sunday, December 3 at 9:00 AM',
            action: {
                label: 'Undo',
            },
        })"
    >
        Show Toast
    </x-ux::button>
</div>

<x-ux::toast />
```

## Usage

Add the toaster once to your application layout.

```blade
<body>
    {{ $slot }}

    <x-ux::toast :message="session('toast')" />
</body>
```

Pass the message from a controller or action.

```php
return to_route('events.index')->with('toast', [
    'title' => 'Event created',
    'description' => 'Sunday, December 3 at 9:00 AM',
]);
```

## Types

Set `type` to `success`, `info`, `warning`, `error`, or `loading` to render a status icon.

```blade preview
<div class="flex flex-wrap gap-2" x-data>
    <x-ux::button variant="outline" x-on:click="$dispatch('toast', { description: 'Event has been created.' })">
        Default
    </x-ux::button>
    <x-ux::button variant="outline" x-on:click="$dispatch('toast', { type: 'success', description: 'Event has been created.' })">
        Success
    </x-ux::button>
    <x-ux::button variant="outline" x-on:click="$dispatch('toast', { type: 'info', description: 'Arrive 10 minutes before the event.' })">
        Info
    </x-ux::button>
    <x-ux::button variant="outline" x-on:click="$dispatch('toast', { type: 'warning', description: 'The event cannot start before 8:00 AM.' })">
        Warning
    </x-ux::button>
    <x-ux::button variant="outline" x-on:click="$dispatch('toast', { type: 'error', description: 'The event could not be created.' })">
        Error
    </x-ux::button>
</div>
```

## Action

```blade preview
<div x-data>
    <x-ux::button
        variant="outline"
        x-on:click="$dispatch('toast', {
            title: 'Event created',
            action: {
                label: 'Undo',
            },
        })"
    >
        Show Toast
    </x-ux::button>
</div>
```

## API Reference

### `x-ux::toast`

| Prop       | Type     | Default |
|------------|----------|---------|
| `message`  | `array`  | `null`  |
