# Dropdown Menu

Displays a menu to the user — such as a set of actions or functions — triggered by a button.

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-56">
        <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>
                Profile
                <x-ux::dropdown-menu.shortcut>⇧+⌘+P</x-ux::dropdown-menu.shortcut>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>
                Billing
                <x-ux::dropdown-menu.shortcut>⌘+B</x-ux::dropdown-menu.shortcut>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>
                Settings
                <x-ux::dropdown-menu.shortcut>⌘+S</x-ux::dropdown-menu.shortcut>
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>
                Keyboard shortcuts
                <x-ux::dropdown-menu.shortcut>⌘+K</x-ux::dropdown-menu.shortcut>
            </x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.item>
                Team
            </x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.sub>
                <x-ux::dropdown-menu.sub.trigger>Invite users</x-ux::dropdown-menu.sub.trigger>
                <x-ux::dropdown-menu.sub.content>
                    <x-ux::dropdown-menu.item>Email</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.item>Message</x-ux::dropdown-menu.item>
                    <x-ux::dropdown-menu.separator />
                    <x-ux::dropdown-menu.item>More...</x-ux::dropdown-menu.item>
                </x-ux::dropdown-menu.sub.content>
            </x-ux::dropdown-menu.sub>
            <x-ux::dropdown-menu.item>
                New Team
            <x-ux::dropdown-menu.shortcut>⌘+T</x-ux::dropdown-menu.shortcut>
        </x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item>Github</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Support</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item disabled>API</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item>
            Log out
            <x-ux::dropdown-menu.shortcut>⇧+⌘+Q</x-ux::dropdown-menu.shortcut>
        </x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Usage

```blade
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger>Open</x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content>
        <x-ux::dropdown-menu.label>My Account</x-ux::dropdown-menu.label>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Billing</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Team</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Subscription</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## Examples

### Checkboxes

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-56">
        <x-ux::dropdown-menu.label>
            Appearance
        </x-ux::dropdown-menu.label>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.checkbox.item :checked=true>
            Status Bar
        </x-ux::dropdown-menu.checkbox.item>
        <x-ux::dropdown-menu.checkbox.item disabled>
            Activity Bar
        </x-ux::dropdown-menu.checkbox.item>
        <x-ux::dropdown-menu.checkbox.item>
            Panel
        </x-ux::dropdown-menu.checkbox.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

### Radio Group

```blade preview
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-56">
        <x-ux::dropdown-menu.label>
            Panel Position
        </x-ux::dropdown-menu.label>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.radio.group value="bottom">
            <x-ux::dropdown-menu.radio.item value="top">
                Top
            </x-ux::dropdown-menu.radio.item>
            <x-ux::dropdown-menu.radio.item value="bottom">
                Bottom
            </x-ux::dropdown-menu.radio.item>
            <x-ux::dropdown-menu.radio.item value="right">
                Right
            </x-ux::dropdown-menu.radio.item>
        </x-ux::dropdown-menu.radio.group>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

## API Reference

### Root

Contains all the parts of a dropdown menu.

| Prop                                                      | Type      | Default |
|-----------------------------------------------------------|-----------|---------|
| `open` [?The controlled open state of the dropdown menu.] | `boolean` | `false` |

### Trigger

The button that toggles the dropdown.

| Prop      | Type                                                                                                              | Default |
|-----------|-------------------------------------------------------------------------------------------------------------------|---------|
| `asChild` | `boolean` [?Change the default rendered element for the one passed as a child, merging their props and behavior.] | `false` |

### Content

The component that pops out when the dropdown menu is open.

| Prop                                                                    | Type                                             | Default    |
|-------------------------------------------------------------------------|--------------------------------------------------|------------|
| `side` [?The preferred side of the trigger to render against when open] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"bottom"` |
| `sideOffset` [?The distance in pixels from the trigger]                 | `number`                                         | `4`        |
| `align` [?The preferred alignment against the trigger]                  | `enum` [?"start" \| "center" \| "end"]           | `"start"`  |

### Item

The component that contains the dropdown menu items.

| Prop                                                                         | Type                                 | Default     |
|------------------------------------------------------------------------------|--------------------------------------|-------------|
| `variant`                                                                    | `enum` [?"default" \| "destructive"] | `"default"` |
| `inset`                                                                      | `boolean`                            | `false`     |
| `disabled` [?When `true`, prevents the user from interacting with the item.] | `boolean`                            | `false`     |

### Sub Trigger

An item that opens a submenu. Must be rendered inside `<x-ux::dropdown-menu.sub>`.

| Prop    | Type      | Default |
|---------|-----------|---------|
| `inset` | `boolean` | `false` |

### Sub Content

The component that pops out when a submenu is open. Must be rendered inside `<x-ux::dropdown-menu.sub>`.

| Prop                                                                    | Type                                             | Default   |
|-------------------------------------------------------------------------|--------------------------------------------------|-----------|
| `side` [?The preferred side of the trigger to render against when open] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"right"` |
| `sideOffset` [?The distance in pixels from the trigger]                 | `number`                                         | `0`       |
| `align` [?The preferred alignment against the trigger]                  | `enum` [?"start" \| "center" \| "end"]           | `"start"` |

### Checkbox Item

An item that can be controlled and rendered like a checkbox.

| Prop                                                                         | Type      | Default |
|------------------------------------------------------------------------------|-----------|---------|
| `checkbox` [?The controlled checked state of the item.]                      | `boolean` | `false` |
| `disabled` [?When `true`, prevents the user from interacting with the item.] | `boolean` | `false` |

### Radio Group

Used to group multiple  `<x-ux::dropdown-group.item>`.

| Prop                                                                         | Type      | Default |
|------------------------------------------------------------------------------|-----------|---------|
| `value` [?The value of the selected item in the group.]                      | `string`  | `""`    |

### Radio Item

An item that can be controlled and rendered like a radio.

| Prop                                                                         | Type      | Default |
|------------------------------------------------------------------------------|-----------|---------|
| `value` [?The unique value of the item.]                                     | `string`  | `""`    |
| `disabled` [?When `true`, prevents the user from interacting with the item.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-dropdown-menu --force
```
