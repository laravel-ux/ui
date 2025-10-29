# Popover

Displays rich content in a portal, triggered by a button.

```blade preview
<x-ux::popover>
    <x-ux::popover.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::popover.trigger>
    <x-ux::popover.content class="w-80">
        <div class="grid gap-4">
            <div class="space-y-2">
                <h4 class="leading-none font-medium">Dimensions</h4>
                <p class="text-muted-foreground text-sm">
                    Set the dimensions for the layer.
                </p>
            </div>
            <div class="grid gap-2">
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="width">Width</x-ux::label>
                    <x-ux::input id="width" value="100%" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="maxWidth">Max. width</x-ux::label>
                    <x-ux::input id="maxWidth" value="300px" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="height">Height</x-ux::label>
                    <x-ux::input id="height" value="25px" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="maxHeight">Max. height</x-ux::label>
                    <x-ux::input id="maxHeight" value="none" class="col-span-2 h-8" />
                </div>
            </div>
        </div>
    </x-ux::popover.content>
</x-ux::popover>
```

## Usage

```blade
<x-ux::popover>
    <x-ux::popover.trigger>Open</x-ux::popover.trigger>
    <x-ux::popover.content>Place content for the popover here.</x-ux::popover.content>
</x-ux::popover>
```

## API Reference

### Content

The component that pops out when the popover is open.

| Prop                                                                     | Type                                             | Default    |
|--------------------------------------------------------------------------|--------------------------------------------------|------------|
| `side` [?The preferred side of the trigger to render against when open.] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"bottom"` |
| `sideOffset` [?The distance in pixels from the trigger.]                 | `number`                                         | `4`        |
| `align` [?The preferred alignment against the trigger.]                  | `enum` [?"start" \| "center" \| "end"]           | `"center"` |

### Trigger

The button that toggles the popover.

| Prop      | Type                                                                                                              | Default |
|-----------|-------------------------------------------------------------------------------------------------------------------|---------|
| `asChild` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-popover --force
```
