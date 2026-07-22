# Kbd

Use `x-ux::kbd` to display keyboard keys and shortcuts. Use `x-ux::kbd.group` when a shortcut contains multiple keys.

## Composition

```text
x-ux::kbd

x-ux::kbd.group
├── x-ux::kbd
└── x-ux::kbd
```

## Examples

```blade
<x-ux::kbd.group>
    <x-ux::kbd>Ctrl</x-ux::kbd>
    <span>+</span>
    <x-ux::kbd>K</x-ux::kbd>
</x-ux::kbd.group>
```

```blade
<x-ux::input-group>
    <x-ux::input-group.input placeholder="Search..." />
    <x-ux::input-group.addon align="inline-end">
        <x-ux::kbd>⌘</x-ux::kbd>
        <x-ux::kbd>K</x-ux::kbd>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Rules

- Display only shortcuts that the surrounding application actually supports.
- Keep one key or symbol in each `x-ux::kbd` when composing a shortcut.
- Use `x-ux::kbd.group` for multiple keys and plain text or a `+` separator between them.
- Use logical spacing utilities when customizing buttons or RTL compositions.
- Do not attach click or keyboard behavior to `x-ux::kbd`; it is presentational and pointer-events are disabled.
