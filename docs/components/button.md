# Button

Displays a button or a component that looks like a button.

```blade preview
<x-ux::button>Button</x-ux::button>
```

## Usage

```blade
<x-ux::button variant="outline">Button</x-ux::button>
```

## Examples

### Variants

Use the `variant` prop to control the visual style of the button.

```blade preview
<x-ux::button>Default</x-ux::button>
<x-ux::button variant="secondary">Secondary</x-ux::button>
<x-ux::button variant="destructive">Destructive</x-ux::button>
<x-ux::button variant="outline">Outline</x-ux::button>
<x-ux::button variant="ghost">Ghost</x-ux::button>
<x-ux::button variant="link">Link</x-ux::button>
```

### Sizes

Use the `size` prop to control the size of the button.

```blade preview
<x-ux::button size="lg">Large</x-ux::button>
<x-ux::button>Default</x-ux::button>
<x-ux::button size="sm">Small</x-ux::button>
```

### As Link

Display an HTML `a` tag as a button bypassing the `href` prop.

```blade preview
<x-ux::button href="https://www.google.com/" target="_blank">
    Google
</x-ux::button>
```

### With Icon

You can nest icons directly inside the button. An appropriate gap is provided automatically.

```blade preview
<x-ux::button size="icon">
    <x-ux::icon name="arrow-right" />
</x-ux::button>
<x-ux::button>
    <x-ux::icon name="mail-open" /> Login with Email
</x-ux::button>
<x-ux::button disabled>
    <x-ux::icon name="loader" class="animate-spin" /> Please wait
</x-ux::button>
```

## API Reference

| Prop      | Type                                                                                  | Default     |
|-----------|---------------------------------------------------------------------------------------|-------------|
| `size`    | `enum` [?"default" \| "sm" \| "lg" \| "icon"]                                         | `"default"` |
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline" \| "ghost" \| "link"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button --force
```
