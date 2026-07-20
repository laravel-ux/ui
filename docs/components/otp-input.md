# OTP Input

A group of single-character text inputs to handle one-time password verification.

```blade preview
<x-ux::otp-input :length=6>
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=0 />
        <x-ux::otp-input.slot :index=1 />
        <x-ux::otp-input.slot :index=2 />
    </x-ux::otp-input.group>
    <x-ux::otp-input.separator />
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=3 />
        <x-ux::otp-input.slot :index=4 />
        <x-ux::otp-input.slot :index=5 />
    </x-ux::otp-input.group>
</x-ux::otp-input>
```

## Usage

```blade
<x-ux::otp-input :length=6>
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=0 />
        <x-ux::otp-input.slot :index=1 />
        <x-ux::otp-input.slot :index=2 />
    </x-ux::otp-input.group>
    <x-ux::otp-input.separator />
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=3 />
        <x-ux::otp-input.slot :index=4 />
        <x-ux::otp-input.slot :index=5 />
    </x-ux::otp-input.group>
</x-ux::otp-input>
```

## Examples

### Pattern

Use the `pattern` prop to define a custom pattern for the input.

```blade preview
<x-ux::otp-input :length=6 pattern="/^[0-9]+$/">
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=0 />
        <x-ux::otp-input.slot :index=1 />
        <x-ux::otp-input.slot :index=2 />
        <x-ux::otp-input.slot :index=3 />
        <x-ux::otp-input.slot :index=4 />
        <x-ux::otp-input.slot :index=5 />
    </x-ux::otp-input.group>
</x-ux::otp-input>
```

### Separator

You can use the `<x-ux::otp-input.separator />` component to add a separator between the input groups.

```blade preview
<x-ux::otp-input :length=6>
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=0 />
        <x-ux::otp-input.slot :index=1 />
    </x-ux::otp-input.group>
    <x-ux::otp-input.separator />
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=2 />
        <x-ux::otp-input.slot :index=3 />
    </x-ux::otp-input.group>
    <x-ux::otp-input.separator />
    <x-ux::otp-input.group>
        <x-ux::otp-input.slot :index=4 />
        <x-ux::otp-input.slot :index=5 />
    </x-ux::otp-input.group>
</x-ux::otp-input>
```

## API Reference

### x-ux::otp-input

Contains all the parts of one-time password.

| Prop                                                                                | Type      | Default |
|-------------------------------------------------------------------------------------|-----------|---------|
| `length*` [?The number of slots]                                                    | `integer` | `-`     |
| `pattern` [?A regular expression that defines which characters are allowed in slot] | `string`  | `-`     |

### x-ux::otp-input.slot

The component that contains the one-time password slot.

| Prop                                                            | Type      | Default |
|-----------------------------------------------------------------|-----------|---------|
| `index*` [?The position of each slot input within the sequence] | `integer` | `-`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-otp-input --force
```
