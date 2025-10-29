# Tooltip

A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.

```blade preview
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <x-ux::button variant="outline">Hover</x-ux::button>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>Add to library</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## Usage

```blade
<x-ux::tooltip>
    <x-ux::tooltip.trigger>
        Hover
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>Add to library</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## API Reference

### Content

The component that pops out when the tooltip is open.

| Prop                                                                     | Type                                             | Default    |
|--------------------------------------------------------------------------|--------------------------------------------------|------------|
| `side` [?The preferred side of the trigger to render against when open.] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"top"`    |
| `sideOffset` [?The distance in pixels from the trigger.]                 | `number`                                         | `4`        |
| `align` [?The preferred alignment against the trigger.]                  | `enum` [?"start" \| "center" \| "end"]           | `"center"` |

### Trigger

The button that toggles the tooltip.

| Prop      | Type                                                                                                              | Default |
|-----------|-------------------------------------------------------------------------------------------------------------------|---------|
| `asChild` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-tooltip --force
```
