# Select

Use `x-ux::select` to choose one value from a popup list.

## Composition

```text
x-ux::select
├── x-ux::select.trigger
│   └── x-ux::select.value
└── x-ux::select.content
    ├── x-ux::select.group
    │   ├── x-ux::select.label
    │   └── x-ux::select.item
    └── x-ux::select.separator
```

## API

- `x-ux::select`: `default-value`, `value`, `name`, `disabled`.
- `x-ux::select.trigger`: `size` (`default`, `sm`), `disabled`.
- `x-ux::select.value`: `placeholder`.
- `x-ux::select.content`: `side`, `side-offset`, `align`.
- `x-ux::select.item`: required `value`, optional `disabled`.

## Example

```blade
<x-ux::select default-value="system" name="theme">
    <x-ux::select.trigger class="w-[180px]">
        <x-ux::select.value placeholder="Theme" />
    </x-ux::select.trigger>
    <x-ux::select.content>
        <x-ux::select.item value="light">Light</x-ux::select.item>
        <x-ux::select.item value="dark">Dark</x-ux::select.item>
        <x-ux::select.item value="system">System</x-ux::select.item>
    </x-ux::select.content>
</x-ux::select>
```

## Rules

- Keep item values stable and unique.
- Use `default-value` for initial uncontrolled state and `x-model` or `wire:model` for mutable state.
- Add `name` when the selected value must be submitted with a native form.
- Use groups, labels, and separators for long or categorized option lists.
- Put `aria-invalid="true"` on the trigger and `data-invalid` on its Field wrapper for errors.
- Use Native Select when native mobile picker behavior is preferred.
