# Toggle Group

A set of two-state buttons that can be toggled on or off.

```blade preview
<x-ux::toggle-group variant="outline" type="multiple">
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Usage

```blade
<x-ux::toggle-group type="single">
    <x-ux::toggle-group.item value="a">A</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="b">B</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="c">C</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Composition

Use the following composition to build a `x-ux::toggle-group`:

```text
x-ux::toggle-group
├── x-ux::toggle-group.item
└── x-ux::toggle-group.item
```

## Outline

Use `variant="outline"` for an outline style.

```blade preview
<x-ux::toggle-group
    variant="outline"
    type="single"
    default-value="all"
>
    <x-ux::toggle-group.item value="all" aria-label="Toggle all">
        All
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="missed" aria-label="Toggle missed">
        Missed
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Size

Use the `size` prop to change the size of the toggle group.

```blade preview
<div class="flex flex-col gap-4">
    <x-ux::toggle-group
        type="single"
        size="sm"
        default-value="top"
        variant="outline"
    >
        <x-ux::toggle-group.item value="top" aria-label="Toggle top">Top</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="bottom" aria-label="Toggle bottom">Bottom</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="left" aria-label="Toggle left">Left</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="right" aria-label="Toggle right">Right</x-ux::toggle-group.item>
    </x-ux::toggle-group>
    <x-ux::toggle-group
        type="single"
        default-value="top"
        variant="outline"
    >
        <x-ux::toggle-group.item value="top" aria-label="Toggle top">Top</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="bottom" aria-label="Toggle bottom">Bottom</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="left" aria-label="Toggle left">Left</x-ux::toggle-group.item>
        <x-ux::toggle-group.item value="right" aria-label="Toggle right">Right</x-ux::toggle-group.item>
    </x-ux::toggle-group>
</div>
```

## Spacing

Use `spacing` to add spacing between toggle group items.

```blade preview
<x-ux::toggle-group
    type="single"
    size="sm"
    default-value="top"
    variant="outline"
    :spacing="2"
>
    <x-ux::toggle-group.item value="top" aria-label="Toggle top">Top</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="bottom" aria-label="Toggle bottom">Bottom</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="left" aria-label="Toggle left">Left</x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="right" aria-label="Toggle right">Right</x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Vertical

Use `orientation="vertical"` for vertical toggle groups.

```blade preview
<x-ux::toggle-group
    type="multiple"
    orientation="vertical"
    :spacing="1"
    :default-value="['bold', 'italic']"
>
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="underline" aria-label="Toggle underline">
        <x-ux::icon name="underline" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Disabled

```blade preview
<x-ux::toggle-group disabled type="multiple">
    <x-ux::toggle-group.item value="bold" aria-label="Toggle bold">
        <x-ux::icon name="bold" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="italic" aria-label="Toggle italic">
        <x-ux::icon name="italic" />
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="strikethrough" aria-label="Toggle strikethrough">
        <x-ux::icon name="underline" />
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## Custom

A custom toggle group example.

```blade preview
<x-ux::field
    x-data="{ fontWeight: 'normal' }"
    class="w-full max-w-xs"
>
    <x-ux::field.label>Font Weight</x-ux::field.label>
    <x-ux::toggle-group
        type="single"
        x-model="fontWeight"
        variant="outline"
        :spacing="2"
        size="lg"
    >
        @foreach ([
            'light' => 'font-light',
            'normal' => 'font-normal',
            'medium' => 'font-medium',
            'bold' => 'font-bold',
        ] as $value => $weight)
            <x-ux::toggle-group.item
                :$value
                :aria-label="ucfirst($value)"
                class="flex size-16 flex-col items-center justify-center rounded-xl"
            >
                <span class="text-2xl leading-none {{ $weight }}">Aa</span>
                <span class="text-xs text-muted-foreground">{{ ucfirst($value) }}</span>
            </x-ux::toggle-group.item>
        @endforeach
    </x-ux::toggle-group>
    <x-ux::field.description>
        Use
        <code
            class="rounded-md bg-muted px-1 py-0.5 font-mono"
            x-text="`font-${fontWeight}`"
        >font-normal</code>
        to set the font weight.
    </x-ux::field.description>
</x-ux::field>
```

## RTL

```blade preview
<x-ux::toggle-group
    variant="outline"
    type="single"
    default-value="list"
    dir="rtl"
>
    <x-ux::toggle-group.item value="list" aria-label="قائمة">
        قائمة
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="grid" aria-label="شبكة">
        شبكة
    </x-ux::toggle-group.item>
    <x-ux::toggle-group.item value="cards" aria-label="بطاقات">
        بطاقات
    </x-ux::toggle-group.item>
</x-ux::toggle-group>
```

## API Reference

### `x-ux::toggle-group`

| Prop            | Type                                  | Default        |
|-----------------|---------------------------------------|----------------|
| `type`          | `enum` [?"single" \| "multiple"]     | `"single"`     |
| `value`         | `string \| array \| null`             | `null`         |
| `default-value` | `string \| array \| null`             | `null`         |
| `variant`       | `enum` [?"default" \| "outline"]     | `"default"`    |
| `size`          | `enum` [?"default" \| "sm" \| "lg"] | `"default"`    |
| `spacing`       | `number`                              | `2`            |
| `orientation`   | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |
| `disabled`      | `boolean`                             | `false`        |

### `x-ux::toggle-group.item`

| Prop       | Type      | Default    |
|------------|-----------|------------|
| `value`    | `string`  | required   |
| `disabled` | `boolean` | `false`    |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-toggle-group --force
```
