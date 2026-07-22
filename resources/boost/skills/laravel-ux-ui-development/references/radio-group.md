# Radio Group

Use `x-ux::radio-group` for a set of mutually exclusive choices.

## Composition

```text
x-ux::radio-group
├── x-ux::radio-group.item
└── x-ux::radio-group.item
```

## API

### `x-ux::radio-group`

| Prop            | Type      | Default    |
|-----------------|-----------|------------|
| `default-value` | string    | `null`     |
| `value`         | string    | `null`     |
| `name`          | string    | `null`     |
| `disabled`      | boolean   | `false`    |
| `orientation`   | enum      | `vertical` |

### `x-ux::radio-group.item`

| Prop       | Type    | Default |
|------------|---------|---------|
| `value`    | string  | required |
| `disabled` | boolean | `false` |

## Example

```blade
<x-ux::radio-group default-value="comfortable" name="density">
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item value="default" id="density-default" />
        <x-ux::label for="density-default">Default</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item value="comfortable" id="density-comfortable" />
        <x-ux::label for="density-comfortable">Comfortable</x-ux::label>
    </div>
</x-ux::radio-group>
```

## Rules

- Keep item values stable and unique.
- Give every item a visible label connected by matching `id` and `for` attributes.
- Use `default-value` for initial uncontrolled state and `x-model` or `wire:model` for mutable state.
- Add `name` when the selected value must be included in a native form submission.
- Put `aria-invalid="true"` on invalid items and `data-invalid` on their Field wrappers.
- Use `x-ux::checkbox` when multiple choices may be selected.
