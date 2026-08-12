# Switch

Use `x-ux::switch` to toggle between checked and unchecked states.

## Usage

```blade
<x-ux::switch />
```

## Description

```blade
<x-ux::field orientation="horizontal">
    <x-ux::field.content>
        <x-ux::field.label for="switch-focus-mode">
            Share across devices
        </x-ux::field.label>
        <x-ux::field.description>
            Focus is shared across devices, and turns off when you leave the app.
        </x-ux::field.description>
    </x-ux::field.content>
    <x-ux::switch id="switch-focus-mode" />
</x-ux::field>
```

## Choice Card

Wrap the field with `x-ux::field.label` to create a clickable card.

```blade
<x-ux::field.label for="switch-share">
    <x-ux::field orientation="horizontal">
        <x-ux::field.content>
            <x-ux::field.title>Share across devices</x-ux::field.title>
            <x-ux::field.description>
                Focus is shared across devices, and turns off when you leave the app.
            </x-ux::field.description>
        </x-ux::field.content>
        <x-ux::switch id="switch-share" />
    </x-ux::field>
</x-ux::field.label>
```

## Disabled

```blade
<x-ux::field orientation="horizontal" data-disabled="true">
    <x-ux::switch id="switch-disabled" disabled />
    <x-ux::field.label for="switch-disabled">Disabled</x-ux::field.label>
</x-ux::field>
```

## Invalid

```blade
<x-ux::field orientation="horizontal" data-invalid="true">
    <x-ux::field.content>
        <x-ux::field.label for="switch-terms">
            Accept terms and conditions
        </x-ux::field.label>
        <x-ux::field.description>
            You must accept the terms and conditions to continue.
        </x-ux::field.description>
    </x-ux::field.content>
    <x-ux::switch id="switch-terms" aria-invalid="true" />
</x-ux::field>
```

## Size

Use `size="sm"` or `size="default"`.

```blade
<x-ux::switch size="sm" />
<x-ux::switch size="default" />
```

## RTL

```blade
<x-ux::field orientation="horizontal" dir="rtl">
    <x-ux::field.label for="switch-rtl">
        المشاركة عبر الأجهزة
    </x-ux::field.label>
    <x-ux::switch id="switch-rtl" />
</x-ux::field>
```

## API Reference

| Prop       | Type            | Default   |
|------------|-----------------|-----------|
| `checked`  | `boolean`       | `false`   |
| `size`     | `sm`, `default` | `default` |
| `name`     | `string`        | `null`    |
| `value`    | `string`        | `on`      |
| `disabled` | `boolean`       | `false`   |
| `form`     | `string`        | `null`    |
