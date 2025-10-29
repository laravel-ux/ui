# Toggle

A two-state button that can be either on or off.

```blade preview
<x-ux::toggle>
    <x-ux::icon name="bold" />
</x-ux::toggle>
```

## Usage

```blade
<x-ux::toggle>Toggle</x-ux::toggle>
```

### Variants

Use the `variant` prop to control the visual style of the toggle.

```blade preview
<x-ux::toggle>
    <x-ux::icon name="bold" />
</x-ux::toggle>
<x-ux::toggle variant="outline">
    <x-ux::icon name="italic" />
</x-ux::toggle>
```

### Sizes

Use the `size` prop to control the size of the toggle.

```blade preview
<x-ux::toggle variant="outline" size="lg">
    <x-ux::icon name="bold" />
</x-ux::toggle>
<x-ux::toggle variant="outline">
    <x-ux::icon name="italic" />
</x-ux::toggle>
<x-ux::toggle variant="outline" size="sm">
    <x-ux::icon name="underline" />
</x-ux::toggle>
```

## API Reference

| Prop                                                    | Type                                | Default     |
|---------------------------------------------------------|-------------------------------------|-------------|
| `pressed` [?The controlled pressed state of the toggle] | `boolean`                           | `false`     |
| `size`                                                  | `enum` [?"default" \| "sm" \| "lg"] | `"default"` |
| `variant`                                               | `enum` [?"default" \| "outline"]    | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-toggle --force
```
