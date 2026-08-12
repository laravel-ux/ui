# Field

Use `x-ux::field` to compose accessible labels, controls, descriptions, and validation messages. Use
`x-ux::field.set` and `x-ux::field.legend` for semantically related controls, and `x-ux::field.group` to manage their
visual spacing.

## Composition

```text
x-ux::field.set
├── x-ux::field.legend
├── x-ux::field.description
└── x-ux::field.group
    ├── x-ux::field
    │   ├── x-ux::field.label
    │   ├── x-ux::input / x-ux::textarea / x-ux::select
    │   ├── x-ux::checkbox / x-ux::radio-group.item / x-ux::switch
    │   ├── x-ux::field.description
    │   └── x-ux::field.error
    ├── x-ux::field.separator
    └── x-ux::field
```

## API

### `x-ux::field`

| Prop          | Values                                 | Default    |
|---------------|----------------------------------------|------------|
| `orientation` | `vertical`, `horizontal`, `responsive` | `vertical` |

### `x-ux::field.legend`

| Prop      | Values            | Default  |
|-----------|-------------------|----------|
| `variant` | `legend`, `label` | `legend` |

### `x-ux::field.label`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::field.error`

| Prop     | Type    | Default |
|----------|---------|---------|
| `errors` | `array` | `[]`    |

## Validation

```blade
<x-ux::field data-invalid="true">
    <x-ux::field.label for="email">Email</x-ux::field.label>
    <x-ux::input id="email" wire:model="email" aria-invalid="true" />
    <x-ux::field.error :errors="$errors->get('email')" />
</x-ux::field>
```

Set `data-invalid="true"` on `x-ux::field` for group styling and `aria-invalid="true"` on the invalid control for assistive
technology. A single error renders as text; multiple unique errors render as a list.

## Layout

- Use vertical orientation for standard label/control/help-text stacks.
- Use horizontal orientation for checkbox, radio, and switch rows.
- Wrap label and description in `x-ux::field.content` when the control sits beside them.
- Use responsive orientation only inside `x-ux::field.group`, which provides the required container query.
- Place related fields in `x-ux::field.set` and use `x-ux::field.legend` instead of a visual-only heading.
- Wrap isolated RTL forms with `x-ux::direction direction="rtl"`; `x-ux::field` uses logical alignment and teleported
  `x-ux::select.content` inherits that direction.

## Choice Cards

Wrap a complete `x-ux::field` in `x-ux::field.label` to make the entire bordered surface activate its checkbox, radio,
or switch. Keep the interactive control inside that `x-ux::field` and match the label's `for` value to the control `id`.

## Rules

- Every form control needs an associated `x-ux::field.label` unless it has an equivalent accessible name.
- Keep helper text in `x-ux::field.description` and validation feedback in `x-ux::field.error`.
- Do not put `checked` or `disabled` on `x-ux::field.label`; pass state to the control.
- Avoid custom spacing between `x-ux::field` parts; their built-in gaps respond to composition and orientation.
- Use `x-ux::field.separator` sparingly between logical sections, not between every field.
