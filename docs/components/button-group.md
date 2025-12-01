# Button Group

A container that groups related buttons together with consistent styling.

```blade preview
<x-ux::button-group>
    <x-ux::button-group class="hidden sm:flex">
        <x-ux::button variant="outline" size="icon" aria-label="Go Back">
            <x-ux::icon name="arrow-left" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline">Archive</x-ux::button>
        <x-ux::button variant="outline">Report</x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline">Snooze</x-ux::button>
        <x-ux::dropdown-menu>
            <x-ux::dropdown-menu.trigger as-child>
                <x-ux::button variant="outline" size="icon" aria-label="More Options">
                    <x-ux::icon name="ellipsis" />
                </x-ux::button>
            </x-ux::dropdown-menu.trigger>
            <x-ux::dropdown-menu.content align="end" className="w-52">
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="mail-check" />
                        Mark as Read
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="archive" />
                        Archive
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.separator />
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="clock" />
                        Snooze
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="calendar-plus" />
                        Add to Calendar
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="list-filter-plus" />
                        Add to List
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.separator />
                <x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.item variant="destructive">
                        <x-ux::icon name="trash-2" />
                        Trash
                    </x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.group>
            </x-ux::dropdown-menu.content>
        </x-ux::dropdown-menu>
    </x-ux::button-group>
</x-ux::button-group>
```

## Usage

```blade
<x-ux::button-group>
  <x-ux::button>Button 1</x-ux::button>
  <x-ux::button>Button 2</x-ux::button>
</x-ux::button-group>
```

## Examples

### Orientation

Set the `orientation` prop to change the button group layout.

```blade preview
<x-ux::button-group orientation="vertical" aria-label="Media controls" class="h-fit">
    <x-ux::button variant="outline" size="icon">
        <x-ux::icon name="plus" />
    </x-ux::button>
    <x-ux::button variant="outline" size="icon">
        <x-ux::icon name="minus" />
    </x-ux::button>
</x-ux::button-group>
```

### Size

Control the size of buttons using the `size` prop on individual buttons.

```blade preview
<div class="flex flex-col items-start gap-8">
    <x-ux::button-group>
        <x-ux::button variant="outline" size="sm">
            Small
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            Button
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            Group
        </x-ux::button>
        <x-ux::button variant="outline" size="icon-sm">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline">Default</x-ux::button>
        <x-ux::button variant="outline">Button</x-ux::button>
        <x-ux::button variant="outline">Group</x-ux::button>
        <x-ux::button variant="outline" size="icon">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline" size="lg">
            Large
        </x-ux::button>
        <x-ux::button variant="outline" size="lg">
            Button
        </x-ux::button>
        <x-ux::button variant="outline" size="lg">
            Group
        </x-ux::button>
        <x-ux::button variant="outline" size="icon-lg">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
</div>
```

### Nested

Nest `<x-ux::button-group>` components to create button groups with spacing.

```blade preview
<x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline" size="sm">
            1
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            2
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            3
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            4
        </x-ux::button>
        <x-ux::button variant="outline" size="sm">
            5
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline" size="icon-sm" aria-label="Previous">
            <x-ux::icon name="arrow-left" />
        </x-ux::button>
        <x-ux::button variant="outline" size="icon-sm" aria-label="Next">
            <x-ux::icon name="arrow-right" />
        </x-ux::button>
    </x-ux::button-group>
</x-ux::button-group>
```

### Separator

The `<x-ux::button-group.separator>` component visually divides buttons within a group.

Buttons with variant `outline` do not need a separator since they have a border.
For other variants, a separator is recommended to improve the visual hierarchy.

```blade preview
<x-ux::button-group>
    <x-ux::button variant="secondary" size="sm">
        Copy
    </x-ux::button>
    <x-ux::button-group.separator />
    <x-ux::button variant="secondary" size="sm">
        Paste
    </x-ux::button>
</x-ux::button-group>
```

### Split

Create a split button group by adding two buttons separated by a `<x-ux::button-group.separator>`.

```blade preview
<x-ux::button-group>
    <x-ux::button variant="secondary">Button</x-ux::button>
    <x-ux::button-group.separator />
    <x-ux::button size="icon" variant="secondary">
        <x-ux::icon name="plus" />
    </x-ux::button>
</x-ux::button-group>
```

### Input

Wrap an `<x-ux::input>` component with buttons.

```blade preview
<x-ux::button-group>
    <x-ux::input placeholder="Search..." />
    <x-ux::button variant="outline" aria-label="Search">
        <x-ux::icon name="search" />
    </x-ux::button>
</x-ux::button-group>
```

### Input Group

Wrap an `<x-ux::input-group>` component to create complex input layouts.

```blade preview
<x-ux::button-group class="[--radius:9999rem]">
    <x-ux::button-group>
        <x-ux::button variant="outline" size="icon">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::input-group>
            <x-ux::input-group.input placeholder="Send a message..." />
            <x-ux::input-group.addon align="inline-end">
                <x-ux::tooltip>
                    <x-ux::tooltip.trigger as-child>
                        <x-ux::input-group.button size="icon-xs">
                            <x-ux::icon name="audio-lines" />
                        </x-ux::input-group.button>
                    </x-ux::tooltip.trigger>
                    <x-ux::tooltip.content>Voice Mode</x-ux::tooltip.content>
                </x-ux::tooltip>
            </x-ux::input-group.addon>
        </x-ux::input-group>
    </x-ux::button-group>
</x-ux::button-group>
```

### Dropdown Menu

Create a split button group with a `<x-ux::dropdown-menu>` component.

```blade preview
<x-ux::button-group>
    <x-ux::button variant="outline">Follow</x-ux::button>
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child>
            <x-ux::button variant="outline" class="!pl-2">
                <x-ux::icon name="chevron-down" />
            </x-ux::button>
        </x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content align="end" class="[--radius:1rem]">
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="volume-off" />
                    Mute Conversation
                </x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="check" />
                    Mark as Read
                </x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="triangle-alert" />
                    Report Conversation
                </x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="user-round-x" />
                    Block User
                </x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="share" />
                    Share Conversation
                </x-ux::dropdown-menu.item>
                <x-ux::dropdown-menu.item>
                    <x-ux::icon name="copy" />
                    Copy Conversation
                </x-ux::dropdown-menu.item>
            </x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.separator />
            <x-ux::dropdown-menu.group>
                <x-ux::dropdown-menu.item variant="destructive">
                    <x-ux::icon name="trash" />
                    Delete Conversation
                </x-ux::dropdown-menu.item>
            </x-ux::dropdown-menu.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</x-ux::button-group>
```

### Select

Pair with a `<x-ux::select>` component.

```blade preview
<x-ux::button-group>
    <x-ux::button-group>
        <x-ux::select value="USD">
            <x-ux::select.trigger>
                <x-ux::select.value class="font-medium" />
            </x-ux::select.trigger>
            <x-ux::select.content class="min-w-24">
                <x-ux::select.item value="USD">
                    USD
                </x-ux::select.item>
                <x-ux::select.item value="EUR">
                    EUR
                </x-ux::select.item>
                <x-ux::select.item value="GBP">
                    GBP
                </x-ux::select.item>
            </x-ux::select.content>
        </x-ux::select>
        <x-ux::input placeholder="10.00" />
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button aria-label="Send" size="icon" variant="outline">
            <x-ux::icon name="arrow-right" />
        </x-ux::button>
    </x-ux::button-group>
</x-ux::button-group>
```

### Popover

Use with a `<x-ux::popover>` component.

```blade preview
<x-ux::button-group>
    <x-ux::button variant="outline">
        <x-ux::icon name="bot" /> Copilot
    </x-ux::button>
    <x-ux::popover>
        <x-ux::popover.trigger as-child>
            <x-ux::button variant="outline" size="icon" aria-label="Open Popover">
                <x-ux::icon name="chevron-down" />
            </x-ux::button>
        </x-ux::popover.trigger>
        <x-ux::popover.content align="end" class="rounded-xl p-0 text-sm">
            <div class="px-4 py-3">
                <div class="text-sm font-medium">Agent Tasks</div>
            </div>
            <x-ux::separator />
            <div class="p-4 text-sm *:[p:not(:last-child)]:mb-2">
                <x-ux::textarea
                    class="mb-4 resize-none"
                    placeholder="Describe your task in natural language."
                />
                <p class="font-medium">Start a new task with Copilot</p>
                <p class="text-muted-foreground">
                    Describe your task in natural language. Copilot will work in the background and open a pull request for your review.
                </p>
            </div>
        </x-ux::popover.content>
    </x-ux::popover>
</x-ux::button-group>
```

## API Reference

### x-ux::button-group

The component is a container that groups related buttons together with consistent styling.

| Prop          | Type                                 | Default        |
|---------------|--------------------------------------|----------------|
| `orientation` | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |

### x-ux::button-group.separator

The component visually divides buttons within a group.

| Prop          | Type                                 | Default      |
|---------------|--------------------------------------|--------------|
| `orientation` | `enum` [?"horizontal" \| "vertical"] | `"vertical"` |

### x-ux::button-group.text

Use this component to display text within a button group.

| Prop       | Type                                                                                                              | Default |
|------------|-------------------------------------------------------------------------------------------------------------------|---------|
| `as-child` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button-group --force
```
