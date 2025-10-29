# Alert

Displays a callout for user attention.

```blade preview
<x-ux::alert>
    <x-ux::icon name="circle-check" />
    <x-ux::alert.title>
        Success! Your changes have been saved.
    </x-ux::alert.title>
    <x-ux::alert.description>
        This is an alert with icon, title and description.
    </x-ux::alert.description>
</x-ux::alert>
```

## Usage

```blade
<x-ux::alert>
    <x-ux::icon name="terminal" />
    <x-ux::alert.title>
        Heads up!
    </x-ux::alert.title>
    <x-ux::alert.description>
        You can add components and dependencies to your app using the cli.
    </x-ux::alert.description>
</x-ux::alert>
```

## Examples

### Variants

Use the `variant` prop to control the visual style of the alert.

```blade preview
<div class="grid gap-4">
    <x-ux::alert>
        <x-ux::icon name="circle-check" />
        <x-ux::alert.title>
            Success! Your changes have been saved.
        </x-ux::alert.title>
        <x-ux::alert.description>
            This is an alert with icon, title and description.
        </x-ux::alert.description>
    </x-ux::alert>
    <x-ux::alert variant="destructive">
        <x-ux::icon name="circle-alert" />
        <x-ux::alert.title>
            Failure! Unable to process your payment.
        </x-ux::alert.title>
        <x-ux::alert.description>
            This is an alert with icon, title and description.
        </x-ux::alert.description>
    </x-ux::alert>
</div>
```

## API Reference

| Prop      | Type                                 | Default     |
|-----------|--------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "destructive"] | `"default"` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-alert --force
```
