# Select

Displays a list of options for the user to pick from—triggered by a button.

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
        <x-ux::select.group>
            <x-ux::select.item value="light">Light</x-ux::select.item>
            <x-ux::select.item value="dark">Dark</x-ux::select.item>
            <x-ux::select.item value="system">System</x-ux::select.item>
        </x-ux::select.group>
    </x-ux::select.content>
</x-ux::select>
```

## Composition

```text
x-ux::select
├── x-ux::select.trigger
│   └── x-ux::select.value
└── x-ux::select.content
    ├── x-ux::select.group
    │   ├── x-ux::select.label
    │   ├── x-ux::select.item
    │   └── x-ux::select.item
    ├── x-ux::select.separator
    └── x-ux::select.group
        ├── x-ux::select.label
        └── x-ux::select.item
```

## Groups

Use groups, labels, and separators to organize related options.

```blade preview
<x-ux::select>
    <x-ux::select.trigger class="w-[220px]">
        <x-ux::select.value placeholder="Select a food" />
    </x-ux::select.trigger>
    <x-ux::select.content>
        <x-ux::select.group>
            <x-ux::select.label>Fruits</x-ux::select.label>
            <x-ux::select.item value="apple">Apple</x-ux::select.item>
            <x-ux::select.item value="banana">Banana</x-ux::select.item>
        </x-ux::select.group>
        <x-ux::select.separator />
        <x-ux::select.group>
            <x-ux::select.label>Vegetables</x-ux::select.label>
            <x-ux::select.item value="carrot">Carrot</x-ux::select.item>
            <x-ux::select.item value="potato">Potato</x-ux::select.item>
        </x-ux::select.group>
    </x-ux::select.content>
</x-ux::select>
```

## Scrollable

The content scrolls when its options exceed the available viewport height.

```blade preview
<x-ux::select>
    <x-ux::select.trigger class="w-[280px]">
        <x-ux::select.value placeholder="Select a timezone" />
    </x-ux::select.trigger>
    <x-ux::select.content class="max-h-60">
        <x-ux::select.group>
            <x-ux::select.label>Timezones</x-ux::select.label>
            @foreach ([
                'gmt-12' => 'International Date Line West',
                'gmt-11' => 'Coordinated Universal Time-11',
                'gmt-10' => 'Hawaii',
                'gmt-9' => 'Alaska',
                'gmt-8' => 'Pacific Time',
                'gmt-7' => 'Mountain Time',
                'gmt-6' => 'Central Time',
                'gmt-5' => 'Eastern Time',
                'gmt' => 'Greenwich Mean Time',
                'gmt+1' => 'Central European Time',
                'gmt+2' => 'Eastern European Time',
                'gmt+3' => 'Kyiv Time',
            ] as $value => $label)
                <x-ux::select.item :value="$value">{{ $label }}</x-ux::select.item>
            @endforeach
        </x-ux::select.group>
    </x-ux::select.content>
</x-ux::select>
```

## Disabled

```blade preview
<x-ux::select>
    <x-ux::select.trigger class="w-[180px]">
        <x-ux::select.value placeholder="Select a fruit" />
    </x-ux::select.trigger>
    <x-ux::select.content>
        <x-ux::select.group>
            <x-ux::select.item value="apple">Apple</x-ux::select.item>
            <x-ux::select.item value="banana" disabled>Banana</x-ux::select.item>
            <x-ux::select.item value="blueberry">Blueberry</x-ux::select.item>
        </x-ux::select.group>
    </x-ux::select.content>
</x-ux::select>
```

## Invalid

Add `data-invalid` to the Field and `aria-invalid` to the trigger.

```blade preview
<x-ux::field data-invalid class="w-full max-w-sm">
    <x-ux::field.label>Fruit</x-ux::field.label>
    <x-ux::select>
        <x-ux::select.trigger aria-invalid="true" class="w-full">
            <x-ux::select.value placeholder="Select a fruit" />
        </x-ux::select.trigger>
        <x-ux::select.content>
            <x-ux::select.item value="apple">Apple</x-ux::select.item>
            <x-ux::select.item value="banana">Banana</x-ux::select.item>
        </x-ux::select.content>
    </x-ux::select>
    <x-ux::field.error>Please select a fruit.</x-ux::field.error>
</x-ux::field>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::select>
        <x-ux::select.trigger class="w-[180px]" dir="rtl">
            <x-ux::select.value placeholder="اختر فاكهة" />
        </x-ux::select.trigger>
        <x-ux::select.content dir="rtl">
            <x-ux::select.group>
                <x-ux::select.label>الفواكه</x-ux::select.label>
                <x-ux::select.item value="apple">تفاحة</x-ux::select.item>
                <x-ux::select.item value="banana">موز</x-ux::select.item>
                <x-ux::select.item value="grapes">عنب</x-ux::select.item>
            </x-ux::select.group>
        </x-ux::select.content>
    </x-ux::select>
</x-ux::direction>
```

## API Reference

### x-ux::select

| Prop            | Type      | Default |
|-----------------|-----------|---------|
| `default-value` | `string`  | `null`  |
| `value`         | `string`  | `null`  |
| `name`          | `string`  | `null`  |
| `disabled`      | `boolean` | `false` |

### x-ux::select.trigger

| Prop       | Type                             | Default     |
|------------|----------------------------------|-------------|
| `size`     | `enum` [?"default" \| "sm"] | `"default"` |
| `disabled` | `boolean`                        | `false`     |

### x-ux::select.value

| Prop          | Type     | Default |
|---------------|----------|---------|
| `placeholder` | `string` | `""`    |

### x-ux::select.content

| Prop          | Type                                             | Default    |
|---------------|--------------------------------------------------|------------|
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left" \| "inline-start" \| "inline-end"] | `"bottom"` |
| `side-offset` | `number`                                         | `4`        |
| `align`       | `enum` [?"start" \| "center" \| "end"]   | `"start"`  |

### x-ux::select.item

| Prop       | Type      | Default |
|------------|-----------|---------|
| `value*`   | `string`  | —       |
| `disabled` | `boolean` | `false` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-select --force
```
