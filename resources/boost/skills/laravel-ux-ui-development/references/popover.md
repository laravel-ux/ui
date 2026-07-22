# Popover

Use `x-ux::popover` to reveal interactive content next to a trigger.

## Composition

```text
x-ux::popover
├── x-ux::popover.trigger
└── x-ux::popover.content
    └── x-ux::popover.header
        ├── x-ux::popover.title
        └── x-ux::popover.description
```

## API

### `x-ux::popover.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::popover.content`

| Prop          | Values                                                        | Default  |
|---------------|---------------------------------------------------------------|----------|
| `side`        | `top`, `right`, `bottom`, `left`, `inline-start`, `inline-end` | `bottom` |
| `side-offset` | number                                                        | `4`      |
| `align`       | `start`, `center`, `end`                                      | `center` |

## Example

```blade
<x-ux::popover>
    <x-ux::popover.trigger as-child>
        <x-ux::button variant="outline">Open Popover</x-ux::button>
    </x-ux::popover.trigger>
    <x-ux::popover.content>
        <x-ux::popover.header>
            <x-ux::popover.title>Title</x-ux::popover.title>
            <x-ux::popover.description>Description text here.</x-ux::popover.description>
        </x-ux::popover.header>
    </x-ux::popover.content>
</x-ux::popover>
```

## Rules

- Use `as-child` when the trigger is an existing button or link.
- Put positioning props on `x-ux::popover.content`.
- Use `x-ux::popover.header`, `x-ux::popover.title`, and `x-ux::popover.description` for the standard heading layout.
- Pass `dir="rtl"` to `x-ux::popover.content` when using logical sides inside an isolated RTL section.
- Keep the content transition-free; `x-ux::popover.content` opens without slide, zoom, or fade animation.
- Use a dialog instead when focus must be trapped or interaction with the rest of the page must be blocked.
