# Slider

Use `x-ux::slider` to select one or more numeric values within a bounded range.

## API

### `x-ux::slider`

| Prop            | Type                                | Default      |
|-----------------|-------------------------------------|--------------|
| `default-value` | `number \| array<number>`           | `[min, max]` |
| `value`         | `number \| array<number> \| null` | `null`       |
| `min`           | `number`                            | `0`          |
| `max`           | `number`                            | `100`        |
| `step`          | `number`                            | `1`          |
| `orientation`   | `horizontal \| vertical`           | `horizontal` |
| `disabled`      | `boolean`                           | `false`      |
| `name`          | `string \| null`                   | `null`       |

## Usage

```blade
<x-ux::slider :default-value="[25, 75]" :min="0" :max="100" :step="5" aria-label="Price range" />
```

## State

- Slider values are always represented as an array, including a single-thumb slider.
- Use `x-model` for client-side state and UI that updates while dragging.
- Add `name` to submit hidden form values. Multiple values use `name[]`.
- Use a Livewire-entangled Alpine property when the server needs the selected values.

## Accessibility

- Always provide `aria-label` when the slider has no visible label.
- Range sliders automatically expose Minimum and Maximum prefixes for their thumb labels.
- Arrow keys move by `step`; Page Up and Page Down move by ten steps; Home and End move to the bounds.

## Rules

- Pass PHP arrays with `:default-value` or `:value`.
- Keep values ordered from smallest to largest.
- Use `orientation="vertical"` only when the surrounding layout provides an explicit height.
- Wrap isolated RTL sliders with `x-ux::direction direction="rtl"`.
