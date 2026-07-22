# Input OTP

Use `x-ux::input-otp` for one-time passwords, verification codes, and short PIN values.

## Composition

```text
x-ux::input-otp
├── x-ux::input-otp.group
│   └── x-ux::input-otp.slot
├── x-ux::input-otp.separator
└── x-ux::input-otp.group
    └── x-ux::input-otp.slot
```

## API

### `x-ux::input-otp`

| Prop      | Type    | Default  |
|-----------|---------|----------|
| `length`  | integer | required |
| `pattern` | string  | `null`   |

### `x-ux::input-otp.slot`

| Prop    | Type    | Default  |
|---------|---------|----------|
| `index` | integer | required |

## Livewire

```blade
<x-ux::input-otp :length="6" pattern="[0-9]" wire:model="verificationCode">
    <x-ux::input-otp.group>
        @foreach (range(0, 5) as $index)
            <x-ux::input-otp.slot :index="$index" />
        @endforeach
    </x-ux::input-otp.group>
</x-ux::input-otp>
```

## Rules

- Pass a regular expression source such as `[0-9]` or `[A-Za-z0-9]` to `pattern`; do not include surrounding `/` delimiters.
- Use `inputmode="text"` when the pattern accepts letters; the default input mode is numeric.
- Keep slot indexes zero-based, unique, sequential, and below `length`.
- Clicking a filled slot selects its character so the next keystroke replaces that position; do not add custom focus handlers to slots.
- Keep the native input selection visually transparent; the slot active state is the visible focus indicator.
- Bind a string property with `wire:model` or `x-model`.
- Put `aria-invalid="true"`, `disabled`, `required`, and other native input attributes on x-ux::input-otp.
- Use `autocomplete="one-time-code"`; it is enabled by default but can be overridden.
