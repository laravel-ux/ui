# Toggle

A two-state button that can be either on or off.

```blade preview
<x-ux::toggle
    aria-label="Toggle bookmark"
    size="sm"
    variant="outline"
    class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-blue-500 data-[state=on]:*:[svg]:stroke-blue-500"
>
    <x-ux::icon name="bookmark" />
    Bookmark
</x-ux::toggle>
```

## Usage

```blade
<x-ux::toggle>Toggle</x-ux::toggle>
```

## Examples

### Default

```blade preview
<x-ux::toggle
    aria-label="Toggle bookmark"
    size="sm"
    variant="outline"
    class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-blue-500 data-[state=on]:*:[svg]:stroke-blue-500"
>
    <x-ux::icon name="bookmark" />
    Bookmark
</x-ux::toggle>
```

### Outline

```blade preview
<x-ux::toggle variant="outline" aria-label="Toggle italic">
    <x-ux::icon name="italic" />
</x-ux::toggle>
```

### With Text

```blade preview
<x-ux::toggle aria-label="Toggle italic">
    <x-ux::icon name="italic" />
    Italic
</x-ux::toggle>
```

### Small

```blade preview
<x-ux::toggle size="sm" aria-label="Toggle italic">
    <x-ux::icon name="italic" />
</x-ux::toggle>
```

### Large

```blade preview
<x-ux::toggle size="lg" aria-label="Toggle italic">
    <x-ux::icon name="italic" />
</x-ux::toggle>
```

### Disabled

```blade preview
<x-ux::toggle aria-label="Toggle italic" disabled>
    <x-ux::icon name="underline" class="h-4 w-4" />
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
