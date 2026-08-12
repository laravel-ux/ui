# Item

Use `x-ux::item` to display compact content with optional media, descriptions, actions, headers, and footers. Use x-ux::field instead when the composition represents a form control.

## Composition

```text
x-ux::item.group
└── x-ux::item
    ├── x-ux::item.header
    ├── x-ux::item.media
    ├── x-ux::item.content
    │   ├── x-ux::item.title
    │   └── x-ux::item.description
    ├── x-ux::item.actions
    └── x-ux::item.footer
```

## API

### `x-ux::item`

| Prop       | Values                          | Default   |
|------------|---------------------------------|-----------|
| `size`     | `default`, `sm`, `xs`           | `default` |
| `variant`  | `default`, `outline`, `muted`   | `default` |
| `as-child` | boolean                         | `false`   |

### `x-ux::item.media`

| Prop      | Values                     | Default   |
|-----------|----------------------------|-----------|
| `variant` | `default`, `icon`, `image` | `default` |

## Example

```blade
<x-ux::item variant="outline">
    <x-ux::item.media variant="icon">
        <x-ux::icon name="package" />
    </x-ux::item.media>
    <x-ux::item.content>
        <x-ux::item.title>Laravel package</x-ux::item.title>
        <x-ux::item.description>Package description.</x-ux::item.description>
    </x-ux::item.content>
    <x-ux::item.actions>
        <x-ux::button size="sm" variant="outline">Open</x-ux::button>
    </x-ux::item.actions>
</x-ux::item>
```

## Rules

- Use `as-child` when x-ux::item should render as a link; provide exactly one root child.
- Use x-ux::item.group with x-ux::item.separator for related lists.
- Use x-ux::item.media variant `icon` for icons and `image` for cropped image thumbnails; avatars use the default media variant.
- Keep actions short and place them in x-ux::item.actions.
- Prefer logical spacing and direction-aware icons in RTL layouts.
