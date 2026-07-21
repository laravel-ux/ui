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
            <x-ux::dropdown-menu.content align="end" class="w-40">
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
                        <x-ux::icon name="list-filter" />
                        Add to List
                    </x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>
                        <x-ux::icon name="tag" />
                        Label As...
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

## Composition

Use the following composition to build a `<x-ux::button-group>`:

```text
x-ux::button-group
├── x-ux::button or x-ux::input
├── x-ux::button-group.separator
└── x-ux::button-group.text
```

## Accessibility

- The `<x-ux::button-group>` component has the `role` attribute set to `group`.
- Use <kbd>Tab</kbd> to navigate between the buttons in the group.
- Use `aria-label` or `aria-labelledby` to label the button group.

```blade
<x-ux::button-group aria-label="Button group">
  <x-ux::button>Button 1</x-ux::button>
  <x-ux::button>Button 2</x-ux::button>
</x-ux::button-group>
```

## Button Group vs Toggle Group

- Use the `<x-ux::button-group>` component when you want to group buttons that perform an action.
- Use the `<x-ux::toggle-group>` component when you want to group buttons that toggle a state.

## Orientation

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

## Size

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

## Nested

Nest `<x-ux::button-group>` components to create button groups with spacing.

```blade preview
<x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button variant="outline" size="icon">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::input-group>
            <x-ux::input-group.input placeholder="Send a message..." />
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::input-group.addon align="inline-end">
                        <x-ux::icon name="audio-lines" />
                    </x-ux::input-group.addon>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content>Voice Mode</x-ux::tooltip.content>
            </x-ux::tooltip>
        </x-ux::input-group>
    </x-ux::button-group>
</x-ux::button-group>
```

## Separator

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

## Split

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

## Input

Wrap an `<x-ux::input>` component with buttons.

```blade preview
<x-ux::button-group>
    <x-ux::input placeholder="Search..." />
    <x-ux::button variant="outline" aria-label="Search">
        <x-ux::icon name="search" />
    </x-ux::button>
</x-ux::button-group>
```

## Input Group

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
                        <x-ux::input-group.button
                            size="icon-xs"
                            aria-pressed="false"
                            class="data-[active=true]:bg-orange-100 data-[active=true]:text-orange-700 dark:data-[active=true]:bg-orange-800 dark:data-[active=true]:text-orange-100"
                        >
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

## Dropdown Menu

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
        <x-ux::dropdown-menu.content align="end" class="w-44">
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

## Select

Pair with a `<x-ux::select>` component.

```blade preview
<x-ux::button-group>
    <x-ux::button-group>
        <x-ux::select value="$">
            <x-ux::select.trigger class="font-mono">
                <x-ux::select.value />
            </x-ux::select.trigger>
            <x-ux::select.content align="start">
                <x-ux::select.item value="$">
                    $ <span class="text-muted-foreground">US Dollar</span>
                </x-ux::select.item>
                <x-ux::select.item value="€">
                    € <span class="text-muted-foreground">Euro</span>
                </x-ux::select.item>
                <x-ux::select.item value="£">
                    £ <span class="text-muted-foreground">British Pound</span>
                </x-ux::select.item>
            </x-ux::select.content>
        </x-ux::select>
        <x-ux::input placeholder="10.00" pattern="[0-9]*" />
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::button aria-label="Send" size="icon" variant="outline">
            <x-ux::icon name="arrow-right" />
        </x-ux::button>
    </x-ux::button-group>
</x-ux::button-group>
```

## Popover

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
        <x-ux::popover.content align="end" class="flex flex-col gap-4 rounded-xl text-sm">
            <div data-slot="popover-header" class="flex flex-col gap-1 text-sm">
                <div class="font-medium">Start a new task with Copilot</div>
                <div class="text-muted-foreground">Describe your task in natural language.</div>
            </div>
            <x-ux::field>
                <x-ux::field.label for="task" class="sr-only">
                    Task Description
                </x-ux::field.label>
                <x-ux::textarea
                    id="task"
                    placeholder="I need to..."
                    class="resize-none"
                />
                <x-ux::field.description>
                    Copilot will open a pull request for review.
                </x-ux::field.description>
            </x-ux::field>
        </x-ux::popover.content>
    </x-ux::popover>
</x-ux::button-group>
```

## RTL

To enable RTL support, set the `dir="rtl"` attribute on a parent element.

```blade preview
<div dir="rtl">
    <x-ux::button-group>
        <x-ux::button-group class="hidden sm:flex">
            <x-ux::button variant="outline" size="icon" aria-label="Go Back">
                <x-ux::icon name="arrow-left" class="rtl:rotate-180" />
            </x-ux::button>
        </x-ux::button-group>
        <x-ux::button-group>
            <x-ux::button variant="outline">أرشفة</x-ux::button>
            <x-ux::button variant="outline">تقرير</x-ux::button>
        </x-ux::button-group>
        <x-ux::button-group>
            <x-ux::button variant="outline">تأجيل</x-ux::button>
            <x-ux::dropdown-menu>
                <x-ux::dropdown-menu.trigger as-child>
                    <x-ux::button variant="outline" size="icon" aria-label="More Options">
                        <x-ux::icon name="ellipsis" />
                    </x-ux::button>
                </x-ux::dropdown-menu.trigger>
                <x-ux::dropdown-menu.content align="start" data-lang="ar" dir="rtl" class="w-40">
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="mail-check" />
                            وضع علامة كمقروء
                        </x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="archive" />
                            أرشفة
                        </x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.separator />
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="clock" />
                            تأجيل
                        </x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="calendar-plus" />
                            إضافة إلى التقويم
                        </x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="list-filter" />
                            إضافة إلى القائمة
                        </x-ux::dropdown-menu.item>
                        <x-ux::dropdown-menu.item>
                            <x-ux::icon name="tag" />
                            تصنيف كـ...
                        </x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
                    <x-ux::dropdown-menu.separator />
                    <x-ux::dropdown-menu.group>
                        <x-ux::dropdown-menu.item variant="destructive">
                            <x-ux::icon name="trash-2" />
                            سلة المهملات
                        </x-ux::dropdown-menu.item>
                    </x-ux::dropdown-menu.group>
                </x-ux::dropdown-menu.content>
            </x-ux::dropdown-menu>
        </x-ux::button-group>
    </x-ux::button-group>
</div>
```

## API Reference

### x-ux::button-group

| Prop          | Type                                 | Default        |
|---------------|--------------------------------------|----------------|
| `orientation` | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |

### x-ux::button-group.separator

| Prop          | Type                                 | Default      |
|---------------|--------------------------------------|--------------|
| `orientation` | `enum` [?"horizontal" \| "vertical"] | `"vertical"` |

### x-ux::button-group.text

| Prop       | Type                                                                                                              | Default |
|------------|-------------------------------------------------------------------------------------------------------------------|---------|
| `as-child` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-button-group --force
```
