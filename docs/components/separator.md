# Separator

Visually divide sections of content or groups of items.

```blade preview
<div class="space-y-1">
    <h4 class="text-sm leading-none font-medium">An open-source UI component library.</h4>
</div>
<x-ux::separator class="my-4" />
<div class="flex h-5 items-center space-x-4 text-sm">
    <div>Blog</div>
    <x-ux::separator orientation="vertical" />
    <div>Docs</div>
    <x-ux::separator orientation="vertical" />
    <div>Source</div>
</div>
```

## Usage

```blade
<x-ux::separator />
```

## Examples

### Orientation

Use the `orientation` prop to control whether the separator is horizontal or vertical.

```blade preview
<div class="flex size-5 items-center space-x-4">
    <x-ux::separator />
    <x-ux::separator orientation="vertical" />
</div>
```

## API Reference

| Prop                                                                              | Type                                 | Default        |
|-----------------------------------------------------------------------------------|--------------------------------------|----------------|
| `orientation`                                                                     | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |
| `decorative` [?When `true`, ensures it is not present in the accessibility tree.] | `boolean`                            | `true`         |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-separator --force
```

