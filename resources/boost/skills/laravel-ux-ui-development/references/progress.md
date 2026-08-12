# Progress

Use `x-ux::progress` to show the completion percentage of a task.

## API

| Prop    | Type   | Default | Range   |
|---------|--------|---------|---------|
| `value` | number | `0`     | `0–100` |

Values outside the supported range are clamped.

## Example

```blade
<x-ux::field class="w-full max-w-sm">
    <x-ux::field.label for="upload-progress">
        <span>Upload progress</span>
        <span class="ms-auto">66%</span>
    </x-ux::field.label>
    <x-ux::progress id="upload-progress" :value="66" aria-label="Upload progress" />
</x-ux::field>
```

## Rules

- Give an unlabelled progress bar an accessible name with `aria-label` or `aria-labelledby`.
- Pass reactive Livewire state with `:value="$property"` when progress changes over time.
- Use `class="rtl:rotate-180"` when progress should advance from right to left.
- Do not use progress for an operation whose completion percentage is unknown; use `x-ux::spinner` instead.
