# Toggle Group

Use `x-ux::toggle-group` for a set of two-state buttons.

## Usage

```blade
<x-ux::toggle-group type="single">
    <x-ux::toggle-group.item value="a">A</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="b">B</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="c">C</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Composition

```text
x-ux::toggle-group
├── x-ux::toggle-group.item
└── x-ux::toggle-group.item
```

## Outline

```blade
<x-ux::toggle-group variant="outline" type="single" default-value="all">
    <x-ux::toggle-group.item value="all">All</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="missed">Missed</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Size

Use `size="sm"`, `size="default"`, or `size="lg"`.

## Spacing

The default spacing is `2`. Use `:spacing="0"` for connected items.

```blade
<x-ux::toggle-group
    type="single"
    variant="outline"
    default-value="top"
    :spacing="0"
>
    <x-ux::toggle-group.item value="top">Top</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="bottom">Bottom</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Vertical

```blade
<x-ux::toggle-group
    type="multiple"
    orientation="vertical"
    :spacing="1"
    :default-value="['bold', 'italic']"
>
    <x-ux::toggle-group.item value="bold">Bold</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic">Italic</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="underline">Underline</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Disabled

```blade
<x-ux::toggle-group disabled type="multiple">
    <x-ux::toggle-group.item value="bold">Bold</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic">Italic</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Custom

Bind a single-value group with `x-model`.

```blade
<x-ux::field x-data="{ fontWeight: 'normal' }">
    <x-ux::field.label>Font Weight</x-ux::field.label>
    <x-ux::toggle-group
        type="single"
        x-model="fontWeight"
        variant="outline"
        :spacing="2"
        size="lg"
    >
        <x-ux::toggle-group.item value="light">Light</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="normal">Normal</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="medium">Medium</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="bold">Bold</x-ux::toggle-group.item>
    </x-ux::toggle-group>
</x-ux::field>
```

## RTL

```blade
<x-ux::toggle-group
    variant="outline"
    type="single"
    default-value="list"
    dir="rtl"
>
    <x-ux::toggle-group.item value="list">قائمة</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="grid">شبكة</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="cards">بطاقات</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## API Reference

### `x-ux::toggle-group`

| Prop            | Type                         | Default      |
|-----------------|------------------------------|--------------|
| `type`          | `single`, `multiple`         | `single`     |
| `value`         | `string`, `array`, `null`    | `null`       |
| `default-value` | `string`, `array`, `null`    | `null`       |
| `variant`       | `default`, `outline`         | `default`    |
| `size`          | `default`, `sm`, `lg`        | `default`    |
| `spacing`       | `number`                     | `2`          |
| `orientation`   | `horizontal`, `vertical`     | `horizontal` |
| `disabled`      | `boolean`                    | `false`      |

### `x-ux::toggle-group.item`

| Prop       | Type      | Default  |
|------------|-----------|----------|
| `value`    | `string`  | required |
| `disabled` | `boolean` | `false`  |
