# Tabs

Use Tabs to display one tab panel at a time.

## Usage

```blade
<x-ux::tabs value="account">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
    </x-ux::tabs.list>
    <x-ux::tabs.content value="account">Make changes to your account here.</x-ux::tabs.content>
    <x-ux::tabs.content value="password">Change your password here.</x-ux::tabs.content>
</x-ux::tabs>
```

## Composition

```text
x-ux::tabs
├── x-ux::tabs.list
│   ├── x-ux::tabs.trigger
│   └── x-ux::tabs.trigger
├── x-ux::tabs.content
└── x-ux::tabs.content
```

## Line

```blade
<x-ux::tabs value="overview">
    <x-ux::tabs.list variant="line">
        <x-ux::tabs.trigger value="overview">Overview</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="analytics">Analytics</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Vertical

```blade
<x-ux::tabs value="account" orientation="vertical">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="account">Account</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="password">Password</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Disabled

```blade
<x-ux::tabs value="home">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="home">Home</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="settings" disabled>Disabled</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## Icons

```blade
<x-ux::tabs value="preview">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="preview">
            <x-ux::icon name="app-window" />
            Preview
        </x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="code">
            <x-ux::icon name="code" />
            Code
        </x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## RTL

```blade
<x-ux::tabs value="overview" dir="rtl">
    <x-ux::tabs.list>
        <x-ux::tabs.trigger value="overview">نظرة عامة</x-ux::tabs.trigger>
        <x-ux::tabs.trigger value="analytics">التحليلات</x-ux::tabs.trigger>
    </x-ux::tabs.list>
</x-ux::tabs>
```

## API Reference

### `x-ux::tabs`

| Prop              | Type                     | Default      |
|-------------------|--------------------------|--------------|
| `value`           | `string`                 | `null`       |
| `orientation`     | `horizontal`, `vertical` | `horizontal` |
| `activation-mode` | `automatic`, `manual`    | `automatic`  |

### `x-ux::tabs.list`

| Prop      | Type              | Default   |
|-----------|-------------------|-----------|
| `variant` | `default`, `line` | `default` |

### `x-ux::tabs.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `value`    | `string`  | required |
| `disabled` | `boolean` | `false` |

### `x-ux::tabs.content`

| Prop    | Type     | Default  |
|---------|----------|----------|
| `value` | `string` | required |
