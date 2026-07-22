# Slider

An input where the user selects a value from within a given range.

```blade preview
<x-ux::slider
    :default-value="[75]"
    :max="100"
    :step="1"
    aria-label="Value"
    class="mx-auto w-full max-w-xs"
/>
```

## Usage

```blade
<x-ux::slider :default-value="[33]" :max="100" :step="1" aria-label="Value" />
```

## Range

Use an array with two values for a range slider.

```blade preview
<x-ux::slider
    :default-value="[25, 50]"
    :max="100"
    :step="5"
    aria-label="Range"
    class="mx-auto w-full max-w-xs"
/>
```

## Multiple Thumbs

Use an array with multiple values for multiple thumbs.

```blade preview
<x-ux::slider
    :default-value="[10, 20, 70]"
    :max="100"
    :step="10"
    aria-label="Values"
    class="mx-auto w-full max-w-xs"
/>
```

## Vertical

Use `orientation="vertical"` for a vertical slider.

```blade preview
<div class="mx-auto flex w-full max-w-xs items-center justify-center gap-6">
    <x-ux::slider
        :default-value="[50]"
        :max="100"
        :step="1"
        orientation="vertical"
        aria-label="First value"
        class="h-40"
    />
    <x-ux::slider
        :default-value="[25]"
        :max="100"
        :step="1"
        orientation="vertical"
        aria-label="Second value"
        class="h-40"
    />
</div>
```

## Controlled

Bind an array with `x-model` when the value is controlled by Alpine or Livewire UI state.

```blade preview
<div x-data="{ temperature: [0.3, 0.7] }" class="mx-auto grid w-full max-w-xs gap-3">
    <div class="flex items-center justify-between gap-2">
        <x-ux::label>Temperature</x-ux::label>
        <span class="text-sm text-muted-foreground" x-text="temperature.join(', ')"></span>
    </div>
    <x-ux::slider
        x-model="temperature"
        :min="0"
        :max="1"
        :step="0.1"
        aria-label="Temperature"
    />
</div>
```

## Disabled

```blade preview
<x-ux::slider
    :default-value="[50]"
    :max="100"
    :step="1"
    disabled
    aria-label="Disabled value"
    class="mx-auto w-full max-w-xs"
/>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <x-ux::slider
        :default-value="[75]"
        :max="100"
        :step="1"
        aria-label="القيمة"
        class="mx-auto w-full max-w-xs"
    />
</x-ux::direction>
```

## API Reference

### x-ux::slider

| Prop            | Type                                | Default        |
|-----------------|-------------------------------------|----------------|
| `default-value` | `number \| array<number>`           | `[min, max]`   |
| `value`         | `number \| array<number> \| null` | `null`         |
| `min`           | `number`                            | `0`            |
| `max`           | `number`                            | `100`          |
| `step`          | `number`                            | `1`            |
| `orientation`   | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |
| `disabled`      | `boolean`                           | `false`        |
| `name`          | `string \| null`                   | `null`         |

## Publishing

```shell
php artisan vendor:publish --tag=ux-slider --force
```
