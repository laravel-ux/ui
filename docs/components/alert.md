# Alert

Displays a callout for user attention.

```blade preview
<div class="grid w-full max-w-xl items-start gap-4">
    <x-ux::alert>
        <x-ux::icon name="circle-check" />
        <x-ux::alert.title>
            Success! Your changes have been saved
        </x-ux::alert.title>
        <x-ux::alert.description>
            This is an alert with icon, title and description.
        </x-ux::alert.description>
    </x-ux::alert>
    <x-ux::alert>
        <x-ux::icon name="popcorn" />
        <x-ux::alert.title>
            This Alert has a title and an icon. No description.
        </x-ux::alert.title>
    </x-ux::alert>
    <x-ux::alert variant="destructive">
        <x-ux::icon name="circle-alert" />
        <x-ux::alert.title>
            Unable to process your payment.
        </x-ux::alert.title>
        <x-ux::alert.description>
            <p>Please verify your billing information and try again.</p>
            <ul class="list-inside list-disc text-sm">
                <li>Check your card details</li>
                <li>Ensure sufficient funds</li>
                <li>Verify billing address</li>
            </ul>
        </x-ux::alert.description>
    </x-ux::alert>
</div>
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

## API Reference

### x-ux::alert

Contains all the parts of an alert.

| Prop      | Type                                 | Default     |
|-----------|--------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "destructive"] | `"default"` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-alert --force
```
