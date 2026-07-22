# Hover Card

Use `x-ux::hover-card` to show a non-modal preview when a sighted user hovers or focuses a trigger.

## Composition

```text
x-ux::hover-card
├── x-ux::hover-card.trigger
└── x-ux::hover-card.content
```

## API

### `x-ux::hover-card.trigger`

| Prop          | Type      | Default |
|---------------|-----------|---------|
| `as-child`    | `boolean` | `false` |
| `delay`       | `number`  | `600`   |
| `close-delay` | `number`  | `300`   |

### `x-ux::hover-card.content`

| Prop          | Values                               | Default  |
|---------------|--------------------------------------|----------|
| `side`        | `top`, `right`, `bottom`, `left`, `inline-start`, `inline-end` | `bottom` |
| `side-offset` | number                               | `4`      |
| `align`       | `start`, `center`, `end`             | `center` |

## Example

```blade
<x-ux::hover-card>
    <x-ux::hover-card.trigger as-child>
        <x-ux::button variant="link">Hover Here</x-ux::button>
    </x-ux::hover-card.trigger>
    <x-ux::hover-card.content>
        Preview content
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Rules

- Use `as-child` when the trigger is an existing link or button.
- Put positioning props on x-ux::hover-card.content and delay props on x-ux::hover-card.trigger.
- Pass `dir="rtl"` to x-ux::hover-card.content when using `inline-start` or `inline-end` inside an isolated RTL section.
- Keep the content transition-free; x-ux::hover-card.content opens without slide, zoom, or fade animation.
- Use a popover or dialog instead when the revealed content must contain interactive controls.
