# Badge

Displays a badge or a component that looks like a badge.

```blade preview
<x-ux::badge>Badge</x-ux::badge>
```

## Usage

```blade
<x-ux::badge variant="outline">Badge</x-ux::badge>
```

## Examples

### Variants

Use the `variant` prop to control the visual style of the badge.

```blade preview
<x-ux::badge>Default</x-ux::badge>
<x-ux::badge variant="secondary">Secondary</x-ux::badge>
<x-ux::badge variant="destructive">Destructive</x-ux::badge>
<x-ux::badge variant="outline">Outline</x-ux::badge>
```

### As Link

Display an HTML `a` tag as a badge bypassing the `href` prop.

```blade preview
<x-ux::badge href="https://www.google.com/" target="_blank">
    Google
</x-ux::badge>
```

## API Reference

| Prop      | Type                                                             | Default     |
|-----------|------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-badge --force
```
