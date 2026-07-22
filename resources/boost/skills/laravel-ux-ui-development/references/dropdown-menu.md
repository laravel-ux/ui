# Dropdown Menu

Use Dropdown Menu for a compact list of actions or settings opened from a trigger. Use Select when choosing a form value
and Navigation Menu for primary navigation.

## Composition

```text
x-ux::dropdown-menu
├── x-ux::dropdown-menu.trigger
└── x-ux::dropdown-menu.content
    ├── x-ux::dropdown-menu.group
    │   ├── x-ux::dropdown-menu.label
    │   ├── x-ux::dropdown-menu.item
    │   ├── x-ux::dropdown-menu.checkbox.item
    │   └── x-ux::dropdown-menu.radio.group
    │       └── x-ux::dropdown-menu.radio.item
    ├── x-ux::dropdown-menu.separator
    └── x-ux::dropdown-menu.sub
        ├── x-ux::dropdown-menu.sub.trigger
        └── x-ux::dropdown-menu.sub.content
```

## API

### `x-ux::dropdown-menu`

| Prop   | Type      | Default | Purpose                     |
|--------|-----------|---------|-----------------------------|
| `open` | `boolean` | `false` | Set the initial open state. |

### `x-ux::dropdown-menu.trigger`

| Prop       | Type      | Default | Purpose                                    |
|------------|-----------|---------|--------------------------------------------|
| `as-child` | `boolean` | `false` | Merge trigger behavior into its one child. |

### `x-ux::dropdown-menu.content`

| Prop          | Values                           | Default  | Purpose                          |
|---------------|----------------------------------|----------|----------------------------------|
| `align`       | `start`, `center`, `end`         | `start`  | Align Content against Trigger.   |
| `side`        | `top`, `right`, `bottom`, `left` | `bottom` | Preferred placement side.        |
| `side-offset` | number                           | `4`      | Distance from Trigger in pixels. |

### Item-like parts

- Item: `variant` (`default` or `destructive`), `inset`, and `disabled`.
- Checkbox Item: `checked`, `inset`, and `disabled`; bind mutable state with `x-model`.
- Radio Group: `value`; bind mutable state with `x-model`.
- Radio Item: required `value`, plus `inset` and `disabled`.
- Label and Sub Trigger: optional `inset`.
- Sub Content: `align`, `side`, and `side-offset`, defaulting to `start`, `right`, and `0`.

Group, Separator, Shortcut, and Sub have no custom props. All parts accept standard HTML attributes and Tailwind
classes.

## Basic Menu

```blade
<x-ux::dropdown-menu>
    <x-ux::dropdown-menu.trigger as-child>
        <x-ux::button variant="outline">Open</x-ux::button>
    </x-ux::dropdown-menu.trigger>
    <x-ux::dropdown-menu.content class="w-40">
        <x-ux::dropdown-menu.group>
            <x-ux::dropdown-menu.label>Account</x-ux::dropdown-menu.label>
            <x-ux::dropdown-menu.item>Profile</x-ux::dropdown-menu.item>
            <x-ux::dropdown-menu.item>Billing</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.group>
        <x-ux::dropdown-menu.separator />
        <x-ux::dropdown-menu.item variant="destructive">Delete account</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.content>
</x-ux::dropdown-menu>
```

Use `as-child` whenever Trigger contains an `x-ux::button`; this preserves one interactive element.

## State

Use `x-model` for client-owned menu, checkbox, or radio state. Use `wire:model` only when the server must react to the
value, with a matching boolean or string property.

```blade
<div x-data="{ compact: false, position: 'bottom' }">
    <x-ux::dropdown-menu>
        {{-- trigger --}}
        <x-ux::dropdown-menu.content>
            <x-ux::dropdown-menu.checkbox.item x-model="compact">
                Compact mode
            </x-ux::dropdown-menu.checkbox.item>
            <x-ux::dropdown-menu.radio.group x-model="position">
                <x-ux::dropdown-menu.radio.item value="top">Top</x-ux::dropdown-menu.radio.item>
                <x-ux::dropdown-menu.radio.item value="bottom">Bottom</x-ux::dropdown-menu.radio.item>
            </x-ux::dropdown-menu.radio.group>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</div>
```

## Items and Actions

- Keep labels short and verb-led for actions.
- Use Shortcut only to display a real application shortcut; it does not register keyboard commands.
- Use `disabled` when an action is temporarily unavailable.
- Use `variant="destructive"` only for consequential actions such as deleting or revoking.
- Put related items in Group and separate unrelated groups with Separator.
- Add an icon only when it improves scanning; keep icon treatment consistent within a group.
- Use `href` on an Item only when the surrounding application already supports navigational item markup; otherwise
  handle the action in Livewire or Alpine.

## Submenus

```blade
<x-ux::dropdown-menu.sub>
    <x-ux::dropdown-menu.sub.trigger>Invite users</x-ux::dropdown-menu.sub.trigger>
    <x-ux::dropdown-menu.sub.content>
        <x-ux::dropdown-menu.item>Email</x-ux::dropdown-menu.item>
        <x-ux::dropdown-menu.item>Message</x-ux::dropdown-menu.item>
    </x-ux::dropdown-menu.sub.content>
</x-ux::dropdown-menu.sub>
```

Keep submenu depth shallow. When users must compare many options, prefer a Dialog, Command, or dedicated page.

## Accessibility and RTL

- Trigger receives menu popup state and controls automatically.
- Arrow keys, Home, End, Enter, Space, Escape, Tab, and typeahead are handled by the component.
- Disabled items are removed from pointer and keyboard selection.
- Content restores focus to Trigger when it closes.
- Set `dir="rtl"` directly on teleported Content and each Sub Content; direction on a source wrapper does not cross a
  teleport boundary.
- Use `align="end"` for the standard RTL placement shown in the documentation.

## Avoid

- Do not add slide, zoom, fade, or other transitions to Content or Sub Content.
- Do not nest a Button inside Trigger without `as-child`.
- Do not add custom `x-show`, outside-click, focus, or keyboard handlers.
- Do not use Item as a checkbox or radio; use the stateful item variants.
- Do not make disabled state visual-only.
- Do not put forms, long explanations, or complex multi-step workflows inside a menu.
- Do not rely on hover alone; every submenu and item must remain keyboard operable.
