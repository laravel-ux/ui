# Number Input

A numeric input element with increment and decrement buttons.

```blade preview
<div class="grid w-full max-w-sm items-center">
    <x-ux::number-input value="0" />
</div>
```

## Usage

```blade
<x-ux::number-input />
```

## API Reference

| Prop                                                          | Type      | Default |
|---------------------------------------------------------------|-----------|---------|
| `min` [?The minimum value of the input element.]              | `integer` | `-`     |
| `max` [?The maximum value of the input element.]              | `integer` | `-`     |
| `step` [?Amount to increment and decrement with the buttons.] | `integer` | `1`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-number-input --force
```
