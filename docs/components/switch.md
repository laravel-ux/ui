# Switch

A control that allows the user to toggle between checked and not checked.

```blade preview
<div class="flex items-center space-x-2">
    <x-ux::switch id="airplane-mode" />
    <x-ux::label for="airplane-mode">Airplane Mode</x-ux::label>
</div>
```

## Usage

```blade
<x-ux::switch />
```

## Description

```blade preview
<x-ux::field orientation="horizontal" class="max-w-sm">
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

Card-style selection where `x-ux::field.label` wraps the entire `x-ux::field` for a clickable card pattern.

```blade preview
<x-ux::field.group class="w-full max-w-sm">
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
    <x-ux::field.label for="switch-notifications">
        <x-ux::field orientation="horizontal">
            <x-ux::field.content>
                <x-ux::field.title>Enable notifications</x-ux::field.title>
                <x-ux::field.description>
                    Receive notifications when focus mode is enabled or disabled.
                </x-ux::field.description>
            </x-ux::field.content>
            <x-ux::switch id="switch-notifications" checked />
        </x-ux::field>
    </x-ux::field.label>
</x-ux::field.group>
```

## Disabled

Add the `disabled` prop to the `x-ux::switch` component to disable the switch. Add the `data-disabled` prop to the
`x-ux::field` component for styling.

```blade preview
<x-ux::field orientation="horizontal" data-disabled="true" class="w-fit">
    <x-ux::switch id="switch-disabled-unchecked" disabled />
    <x-ux::field.label for="switch-disabled-unchecked">Disabled</x-ux::field.label>
</x-ux::field>
```

## Invalid

Add the `aria-invalid` prop to the `x-ux::switch` component to indicate an invalid state. Add the `data-invalid` prop to
the `x-ux::field` component for styling.

```blade preview
<x-ux::field orientation="horizontal" class="max-w-sm" data-invalid="true">
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

Use the `size` prop to change the size of the switch.

```blade preview
<x-ux::field.group class="w-full max-w-[10rem]">
    <x-ux::field orientation="horizontal">
        <x-ux::switch id="switch-size-sm" size="sm" />
        <x-ux::field.label for="switch-size-sm">Small</x-ux::field.label>
    </x-ux::field>
    <x-ux::field orientation="horizontal">
        <x-ux::switch id="switch-size-default" size="default" />
        <x-ux::field.label for="switch-size-default">Default</x-ux::field.label>
    </x-ux::field>
</x-ux::field.group>
```

## RTL

```blade preview
<x-ux::field orientation="horizontal" class="max-w-sm" dir="rtl">
    <x-ux::field.content>
        <x-ux::field.label for="switch-focus-mode-rtl">
            المشاركة عبر الأجهزة
        </x-ux::field.label>
        <x-ux::field.description>
            يتم مشاركة التركيز عبر الأجهزة، ويتم إيقاف تشغيله عند مغادرة التطبيق.
        </x-ux::field.description>
    </x-ux::field.content>
    <x-ux::switch id="switch-focus-mode-rtl" />
</x-ux::field>
```

## API Reference

| Prop       | Type                            | Default     |
|------------|---------------------------------|-------------|
| `checked`  | `boolean`                       | `false`     |
| `size`     | `enum` [?"sm" \| "default"]    | `"default"` |
| `name`     | `string`                        | `null`      |
| `value`    | `string`                        | `"on"`      |
| `disabled` | `boolean`                       | `false`     |
| `form`     | `string`                        | `null`      |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-switch --force
```
