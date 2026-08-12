# Toggle

A two-state button that can be either on or off.

```blade preview
<x-ux::toggle aria-label="Toggle bookmark" size="sm" variant="outline">
    <x-ux::icon
        name="bookmark"
        class="group-data-[state=on]/toggle:fill-foreground"
    />
    Bookmark
</x-ux::toggle>
```

## Usage

```blade
<x-ux::toggle>Toggle</x-ux::toggle>
```

## Outline

Use `variant="outline"` for an outline style.

```blade preview
<div class="flex flex-wrap items-center gap-2">
    <x-ux::toggle variant="outline" aria-label="Toggle italic">
        <x-ux::icon name="italic" />
        Italic
    </x-ux::toggle>
    <x-ux::toggle variant="outline" aria-label="Toggle bold">
        <x-ux::icon name="bold" />
        Bold
    </x-ux::toggle>
</div>
```

## With Text

```blade preview
<x-ux::toggle aria-label="Toggle italic">
    <x-ux::icon name="italic" />
    Italic
</x-ux::toggle>
```

## Size

Use the `size` prop to change the size of the toggle.

```blade preview
<div class="flex flex-wrap items-center gap-2">
    <x-ux::toggle variant="outline" aria-label="Toggle small" size="sm">
        Small
    </x-ux::toggle>
    <x-ux::toggle variant="outline" aria-label="Toggle default" size="default">
        Default
    </x-ux::toggle>
    <x-ux::toggle variant="outline" aria-label="Toggle large" size="lg">
        Large
    </x-ux::toggle>
</div>
```

## Disabled

```blade preview
<div class="flex flex-wrap items-center gap-2">
    <x-ux::toggle aria-label="Toggle disabled" disabled>
        Disabled
    </x-ux::toggle>
    <x-ux::toggle variant="outline" aria-label="Toggle disabled outline" disabled>
        Disabled
    </x-ux::toggle>
</div>
```

## RTL

```blade preview
<x-ux::toggle
    aria-label="Toggle bookmark"
    size="sm"
    variant="outline"
    dir="rtl"
>
    <x-ux::icon
        name="bookmark"
        class="group-aria-pressed/toggle:fill-foreground"
    />
    إشارة مرجعية
</x-ux::toggle>
```

## API Reference

| Prop      | Type                                  | Default     |
|-----------|---------------------------------------|-------------|
| `pressed` | `boolean`                             | `false`     |
| `variant` | `enum` [?"default" \| "outline"]     | `"default"` |
| `size`    | `enum` [?"default" \| "sm" \| "lg"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-toggle --force
```
