# Toast

Use `x-ux::toast` once in the application layout to display Base UI toast notifications from Laravel session data or browser events.

## Layout Usage

```blade
<body>
    {{ $slot }}

    <x-ux::toast :message="session('toast')" />
</body>
```

## Laravel Session

Pass the session value to `message`. The component does not read from the session itself.

```php
return back()->with('toast', [
    'type' => 'success',
    'title' => 'Changes saved',
    'description' => 'Your profile has been updated.',
]);
```

A message can contain `title`, `description`, `type`, and an action. Valid types are `default`, `success`, `info`, `warning`, `error`, and `loading`.

## Browser Event

```blade
<div x-data>
    <x-ux::button
        x-on:click="$dispatch('toast', {
            title: 'Event created',
            description: 'Sunday, December 3 at 9:00 AM',
        })"
    >
        Show Toast
    </x-ux::button>
</div>
```

## API Reference

| Prop       | Type     | Default |
|------------|----------|---------|
| `message`  | `array`  | `null`  |
