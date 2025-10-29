# Checkbox

A control that allows the user to toggle between checked and not checked.

```blade preview
<div class="flex items-center gap-3">
    <x-ux::checkbox id="terms" />
    <x-ux::label for="terms">Accept terms and conditions</x-ux::label>
</div>
```

## Usage

```blade
<x-ux::checkbox />
```

## API Reference

| Prop                                                      | Type      | Default |
|-----------------------------------------------------------|-----------|---------|
| `checked`[?The controlled checked state of the checkbox.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-checkbox --force
```
