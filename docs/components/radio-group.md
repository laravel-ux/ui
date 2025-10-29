# Radio Group

A set of checkable buttons—known as radio buttons—where no more than one of the buttons can be checked at a time.

```blade preview
<x-ux::radio-group value="comfortable">
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="default" value="default" />
        <x-ux::label for="default">Default</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="comfortable" value="comfortable" />
        <x-ux::label for="comfortable">Comfortable</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="compact" value="compact" />
        <x-ux::label for="compact">Compact</x-ux::label>
    </div>
</x-ux::radio-group>
```

## Usage

```blade
<x-ux::radio-group value="option-one">
    <div className="flex items-center space-x-2">
        <x-ux::radio-group.item value="option-one" id="option-one" />
        <Label for="option-one">Option One</Label>
    </div>
    <div className="flex items-center space-x-2">
        <x-ux::radio-group.item value="option-two" id="option-two" />
        <Label for="option-two">Option Two</Label>
    </div>
</x-ux::radio-group>
```

## API Reference

### Root

Contains all the parts of a radio group.

| Prop                                                        | Type     | Default |
|-------------------------------------------------------------|----------|---------|
| `value` [?The controlled value of the radio item to check.] | `string` | `-`     |

### Item

An item in the group that can be checked.

| Prop                                     | Type     | Default |
|------------------------------------------|----------|---------|
| `value*` [?A unique value for the item.] | `string` | `-`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-radio-group --force
```
