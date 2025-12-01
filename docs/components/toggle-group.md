# Toggle Group

A set of two-state buttons that can be toggled on or off.

```blade preview
<x-ux::toggle-group variant="outline" spacing="2" size="sm">
    <x-ux::toggle-group.item
        value="star"
        aria-label="Toggle star"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-yellow-500 data-[state=on]:*:[svg]:stroke-yellow-500"
    >
        <x-ux::icon name="star" />
        Star
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item
        value="heart"
        aria-label="Toggle heart"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-red-500 data-[state=on]:*:[svg]:stroke-red-500"
    >
        <x-ux::icon name="heart" />
        Heart
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item
        value="bookmark"
        aria-label="Toggle bookmark"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-blue-500 data-[state=on]:*:[svg]:stroke-blue-500"
    >
        <x-ux::icon name="bookmark" />
        Bookmark
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

## Examples

### Outline

```blade preview
<x-ux::toggle-group variant="outline">
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" class="h-4 w-4" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Single

```blade preview
<x-ux::toggle-group>
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" class="h-4 w-4" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Small

```blade preview
<x-ux::toggle-group size="sm">
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" class="h-4 w-4" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Large

```blade preview
<x-ux::toggle-group size="lg">
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" class="h-4 w-4" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Disabled

```blade preview
<x-ux::toggle-group disabled>
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" class="h-4 w-4" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" class="h-4 w-4" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

### Spacing

Use `spacing` to add spacing between toggle group items.

```blade preview
<x-ux::toggle-group variant="outline" spacing="2" size="sm">
    <x-ux::toggle-group.item
        value="star"
        aria-label="Toggle star"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-yellow-500 data-[state=on]:*:[svg]:stroke-yellow-500"
    >
        <x-ux::icon name="star" />
        Star
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item
        value="heart"
        aria-label="Toggle heart"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-red-500 data-[state=on]:*:[svg]:stroke-red-500"
    >
        <x-ux::icon name="heart" />
        Heart
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item
        value="bookmark"
        aria-label="Toggle bookmark"
        class="data-[state=on]:bg-transparent data-[state=on]:*:[svg]:fill-blue-500 data-[state=on]:*:[svg]:stroke-blue-500"
    >
        <x-ux::icon name="bookmark" />
        Bookmark
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## API Reference

### x-ux::toggle-group

Contains all the parts of a toggle group.

| Prop                                                                        | Type                                | Default     |
|-----------------------------------------------------------------------------|-------------------------------------|-------------|
| `value` [?The value of the item to show as pressed when initially rendered] | `string`                            | `-`         |
| `size`                                                                      | `enum` [?"default" \| "sm" \| "lg"] | `"default"` |
| `variant`                                                                   | `enum` [?"default" \| "outline"]    | `"default"` |
| `spacing`                                                                   | `number`                            | `0`         |

### x-ux::toggle-group.item

An item in the group.

| Prop                                    | Type     | Default |
|-----------------------------------------|----------|---------|
| `value*` [?A unique value for the item] | `string` | `-`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-toggle-group --force
```
