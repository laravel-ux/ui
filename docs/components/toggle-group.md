# Toggle Group

A set of two-state buttons that can be toggled on or off.

```blade preview
<x-ux::toggle-group variant="outline">
    <x-ux::toggle-group.item value="bold">
        <x-ux::icon name="bold" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic">
        <x-ux::icon name="italic" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough">
        <x-ux::icon name="underline" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Usage

```blade
<x-ux::toggle-group>
    <x-ux::toggle-group.item value="a">A</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="b">B</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="c">C</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Variants

Use the `variant` prop to control the visual style of the toggle group.

```blade preview
<div class="flex gap-4">
    <x-ux::toggle-group>
        <x-ux::toggle-group.item value="bold">
            <x-ux::icon name="bold" />
        </x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="italic">
            <x-ux::icon name="italic" />
        </x-ux::toggle-group.item>
    </x-ux::toggle-group>
    <x-ux::toggle-group variant="outline">
        <x-ux::toggle-group.item value="bold">
            <x-ux::icon name="bold" />
        </x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="italic">
            <x-ux::icon name="italic" />
        </x-ux::toggle-group.item>
    </x-ux::toggle-group>
</div>
```

### Sizes

Use the `size` prop to control the size of the toggle group.

```blade preview
<div class="flex gap-4">
    <x-ux::toggle-group variant="outline" size="lg">
        <x-ux::toggle-group.item value="bold">
            <x-ux::icon name="bold" />
        </x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="italic">
            <x-ux::icon name="italic" />
        </x-ux::toggle-group.item>
    </x-ux::toggle-group>
    <x-ux::toggle-group variant="outline">
        <x-ux::toggle-group.item value="bold">
            <x-ux::icon name="bold" />
        </x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="italic">
            <x-ux::icon name="italic" />
        </x-ux::toggle-group.item>
    </x-ux::toggle-group>
    <x-ux::toggle-group variant="outline" size="sm">
        <x-ux::toggle-group.item value="bold">
            <x-ux::icon name="bold" />
        </x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="italic">
            <x-ux::icon name="italic" />
        </x-ux::toggle-group.item>
    </x-ux::toggle-group>
</div>
```

## API Reference

### Root

Contains all the parts of a toggle group.

| Prop                                                                        | Type                                | Default     |
|-----------------------------------------------------------------------------|-------------------------------------|-------------|
| `value` [?The value of the item to show as pressed when initially rendered] | `string`                            | `""`        |
| `size`                                                                      | `enum` [?"default" \| "sm" \| "lg"] | `"default"` |
| `variant`                                                                   | `enum` [?"default" \| "outline"]    | `"default"` |

### Item

An item in the group.

| Prop                                    | Type     | Default |
|-----------------------------------------|----------|---------|
| `value*` [?A unique value for the item] | `string` | `-`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-toggle-group --force
```
