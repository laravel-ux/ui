# Radio Group

A set of checkable buttons—known as radio buttons—where no more than one button can be checked at a time.

```blade preview
<x-ux::radio-group default-value="comfortable" class="w-fit">
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="r1" value="default" />
        <x-ux::label for="r1">Default</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="r2" value="comfortable" />
        <x-ux::label for="r2">Comfortable</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item id="r3" value="compact" />
        <x-ux::label for="r3">Compact</x-ux::label>
    </div>
</x-ux::radio-group>
```

## Usage

```blade
<x-ux::radio-group default-value="option-one">
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item value="option-one" id="option-one" />
        <x-ux::label for="option-one">Option One</x-ux::label>
    </div>
    <div class="flex items-center gap-3">
        <x-ux::radio-group.item value="option-two" id="option-two" />
        <x-ux::label for="option-two">Option Two</x-ux::label>
    </div>
</x-ux::radio-group>
```

## Composition

```text
x-ux::radio-group
├── x-ux::radio-group.item
└── x-ux::radio-group.item
```

## Description

Use Field components to add descriptions to radio items.

```blade preview
<x-ux::radio-group default-value="comfortable" class="w-fit">
    @foreach ([
        'default' => ['Default', 'Standard spacing for most use cases.'],
        'comfortable' => ['Comfortable', 'More space between elements.'],
        'compact' => ['Compact', 'Minimal spacing for dense layouts.'],
    ] as $value => [$label, $description])
        <x-ux::field orientation="horizontal">
            <x-ux::radio-group.item :value="$value" :id="'description-' . $value" />
            <x-ux::field.content>
                <x-ux::field.label :for="'description-' . $value">{{ $label }}</x-ux::field.label>
                <x-ux::field.description>{{ $description }}</x-ux::field.description>
            </x-ux::field.content>
        </x-ux::field>
    @endforeach
</x-ux::radio-group>
```

## Choice Card

Wrap each Field in `x-ux::field.label` to make the whole card clickable.

```blade preview
<x-ux::radio-group default-value="plus" class="max-w-sm">
    @foreach ([
        'plus' => ['Plus', 'For individuals and small teams.'],
        'pro' => ['Pro', 'For growing businesses.'],
        'enterprise' => ['Enterprise', 'For large teams and enterprises.'],
    ] as $value => [$title, $description])
        <x-ux::field.label :for="$value . '-plan'">
            <x-ux::field orientation="horizontal">
                <x-ux::field.content>
                    <x-ux::field.title>{{ $title }}</x-ux::field.title>
                    <x-ux::field.description>{{ $description }}</x-ux::field.description>
                </x-ux::field.content>
                <x-ux::radio-group.item :value="$value" :id="$value . '-plan'" />
            </x-ux::field>
        </x-ux::field.label>
    @endforeach
</x-ux::radio-group>
```

## Fieldset

```blade preview
<x-ux::field.set class="w-full max-w-xs">
    <x-ux::field.legend variant="label">Subscription Plan</x-ux::field.legend>
    <x-ux::field.description>
        Yearly and lifetime plans offer significant savings.
    </x-ux::field.description>
    <x-ux::radio-group default-value="monthly" name="plan">
        @foreach ([
            'monthly' => 'Monthly ($9.99/month)',
            'yearly' => 'Yearly ($99.99/year)',
            'lifetime' => 'Lifetime ($299.99)',
        ] as $value => $label)
            <x-ux::field orientation="horizontal">
                <x-ux::radio-group.item :value="$value" :id="'plan-' . $value" />
                <x-ux::field.label :for="'plan-' . $value" class="font-normal">
                    {{ $label }}
                </x-ux::field.label>
            </x-ux::field>
        @endforeach
    </x-ux::radio-group>
</x-ux::field.set>
```

## Disabled

```blade preview
<x-ux::radio-group default-value="option-two" class="w-fit">
    @foreach (['option-one' => 'Disabled', 'option-two' => 'Option Two', 'option-three' => 'Option Three'] as $value => $label)
        <x-ux::field orientation="horizontal" :data-disabled="$value === 'option-one'">
            <x-ux::radio-group.item
                :value="$value"
                :id="'disabled-' . $value"
                :disabled="$value === 'option-one'"
            />
            <x-ux::field.label :for="'disabled-' . $value" class="font-normal">{{ $label }}</x-ux::field.label>
        </x-ux::field>
    @endforeach
</x-ux::radio-group>
```

## Invalid

```blade preview
<x-ux::field.set class="w-full max-w-xs">
    <x-ux::field.legend variant="label">Notification Preferences</x-ux::field.legend>
    <x-ux::field.description>Choose how you want to receive notifications.</x-ux::field.description>
    <x-ux::radio-group default-value="email">
        @foreach (['email' => 'Email only', 'sms' => 'SMS only', 'both' => 'Both Email & SMS'] as $value => $label)
            <x-ux::field orientation="horizontal" data-invalid>
                <x-ux::radio-group.item :value="$value" :id="'invalid-' . $value" aria-invalid="true" />
                <x-ux::field.label :for="'invalid-' . $value" class="font-normal">{{ $label }}</x-ux::field.label>
            </x-ux::field>
        @endforeach
    </x-ux::radio-group>
</x-ux::field.set>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::radio-group default-value="comfortable" class="w-fit" dir="rtl">
        @foreach ([
            'default' => ['افتراضي', 'تباعد قياسي لمعظم حالات الاستخدام.'],
            'comfortable' => ['مريح', 'مساحة أكبر بين العناصر.'],
            'compact' => ['مضغوط', 'تباعد أدنى للتخطيطات الكثيفة.'],
        ] as $value => [$label, $description])
            <x-ux::field orientation="horizontal">
                <x-ux::radio-group.item :value="$value" :id="'rtl-' . $value" />
                <x-ux::field.content>
                    <x-ux::field.label :for="'rtl-' . $value">{{ $label }}</x-ux::field.label>
                    <x-ux::field.description>{{ $description }}</x-ux::field.description>
                </x-ux::field.content>
            </x-ux::field>
        @endforeach
    </x-ux::radio-group>
</x-ux::direction>
```

## API Reference

### x-ux::radio-group

| Prop            | Type      | Default      |
|-----------------|-----------|--------------|
| `default-value` | `string`  | `null`       |
| `value`         | `string`  | `null`       |
| `name`          | `string`  | `null`       |
| `disabled`      | `boolean` | `false`      |
| `orientation`   | `enum` [?"vertical" \| "horizontal"] | `"vertical"` |

### x-ux::radio-group.item

| Prop       | Type      | Default |
|------------|-----------|---------|
| `value*`   | `string`  | —       |
| `disabled` | `boolean` | `false` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-radio-group --force
```
