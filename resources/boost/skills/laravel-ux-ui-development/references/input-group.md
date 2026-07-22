# Input Group

Use `x-ux::input-group` to place icons, text, keyboard hints, and buttons around a unified input or textarea.

## Composition

```text
x-ux::input-group
├── x-ux::input-group.input or x-ux::input-group.textarea
└── x-ux::input-group.addon
    ├── x-ux::input-group.button
    └── x-ux::input-group.text
```

## API

### `x-ux::input-group.addon`

| Prop    | Values                                                    | Default        |
|---------|-----------------------------------------------------------|----------------|
| `align` | `inline-start`, `inline-end`, `block-start`, `block-end` | `inline-start` |

### `x-ux::input-group.button`

| Prop      | Values                                                                 | Default |
|-----------|------------------------------------------------------------------------|---------|
| `size`    | `xs`, `icon-xs`, `sm`, `icon-sm`                                      | `xs`    |
| `variant` | `default`, `secondary`, `destructive`, `outline`, `ghost`, `link`     | `ghost` |

## Example

```blade
<x-ux::input-group>
    <x-ux::input-group.input wire:model.live.debounce.300ms="query" placeholder="Search..." />
    <x-ux::input-group.addon>
        <x-ux::icon name="search" />
    </x-ux::input-group.addon>
    <x-ux::input-group.addon align="inline-end">
        <x-ux::kbd>⌘K</x-ux::kbd>
    </x-ux::input-group.addon>
</x-ux::input-group>
```

## Rules

- Place x-ux::input-group.addon after x-ux::input-group.input or x-ux::input-group.textarea in the markup; use `align` for visual ordering.
- Use `inline-start` or `inline-end` with inputs and `block-start` or `block-end` with textareas.
- Use x-ux::input-group.button for actions inside an addon and give icon-only buttons an `aria-label`.
- Set `data-disabled` on x-ux::input-group when the group must expose a disabled state to its addons.
- Add `data-slot="input-group-control"` to a custom control so focus and invalid styles propagate to the group.
- Use logical spacing utilities such as `ms`, `me`, `ps`, and `pe` in custom classes so the composition works in RTL.
