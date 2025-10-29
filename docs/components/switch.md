# Switch

A control that allows the user to toggle between checked and not checked.

```blade preview
<div class="flex items-center space-x-2">
    <x-ux::switch id=airplane-mode />
    <x-ux::label for="airplane-mode">Airplane Mode</x-ux::label>
</div>
```

## Usage

```blade
<x-ux::switch />
```

## API Reference

| Prop                                            | Type      | Default |
|-------------------------------------------------|-----------|---------|
| `checked`[?The controlled state of the switch.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-switch --force
```
