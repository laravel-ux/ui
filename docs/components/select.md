# Select

Displays a list of options for the user to pick from - triggered by a button.

```blade preview
<x-ux::select>
    <x-ux::select.trigger class="w-[180px]">
        <x-ux::select.value placeholder="Select a fruit" />
    </x-ux::select.trigger>
    <x-ux::select.content>
        <x-ux::select.group>
            <x-ux::select.label>Fruits</x-ux::select.label>
            <x-ux::select.item value="apple">Apple</x-ux::select.item>
            <x-ux::select.item value="banana">Banana</x-ux::select.item>
            <x-ux::select.item value="blueberry">Blueberry</x-ux::select.item>
            <x-ux::select.item value="grapes">Grapes</x-ux::select.item>
            <x-ux::select.item value="pineapple">Pineapple</x-ux::select.item>
        </x-ux::select.group>
    </x-ux::select.content>
</x-ux::select>
```

## Usage

```blade
<x-ux::select>
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

## API Reference

### Root

Contains all the parts of a select.

| Prop                                           | Type     | Default |
|------------------------------------------------|----------|---------|
| `value` [?The controlled value of the select.] | `string` | `-`     |

### Trigger

The button that toggles the select.

| Prop   | Type                        | Default     |
|--------|-----------------------------|-------------|
| `size` | `enum` [?"default" \| "sm"] | `"default"` |

### Value

The part that reflects the selected value.

| Prop          | Type                                                                          | Default |
|---------------|-------------------------------------------------------------------------------|---------|
| `placeholder` | `string` [?The content that will be rendered inside the value when no value.] | `-`     |

### Item

The component that contains the select items.

| Prop                                                            | Type     | Default |
|-----------------------------------------------------------------|----------|---------|
| `value*` [?The value given as data when submitted with a name.] | `string` | `-`     |


## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-select --force
```
