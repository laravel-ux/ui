# Progress

Displays an indicator showing the completion progress of a task, typically displayed as a progress bar.

```blade preview
<x-ux::progress :value="66" class="w-[60%]" aria-label="Upload progress" />
```

## Usage

```blade
<x-ux::progress :value="33" aria-label="Upload progress" />
```

## Label

Use a `x-ux::field` component to add a visible label and value to the progress bar.

```blade preview
<x-ux::field class="w-full max-w-sm">
    <x-ux::field.label for="progress-upload">
        <span>Upload progress</span>
        <span class="ms-auto">66%</span>
    </x-ux::field.label>
    <x-ux::progress id="progress-upload" :value="66" aria-label="Upload progress" />
</x-ux::field>
```

## Controlled

Pass reactive Livewire state to `value` to update the progress bar.

```blade
<x-ux::progress :value="$progress" aria-label="Upload progress" />
```

The value is clamped to the range from `0` to `100`.

## RTL

Rotate the indicator in right-to-left layouts so progress advances from right to left.

```blade preview
<x-ux::field class="w-full max-w-sm" dir="rtl">
    <x-ux::field.label for="progress-upload-rtl">
        <span>تقدم الرفع</span>
        <span class="ms-auto">٦٦%</span>
    </x-ux::field.label>
    <x-ux::progress
        id="progress-upload-rtl"
        :value="66"
        aria-label="تقدم الرفع"
        class="rtl:rotate-180"
    />
</x-ux::field>
```

## API Reference

| Prop    | Type     | Default |
|---------|----------|---------|
| `value` | `number` | `0`     |

## Publishing

```shell
php artisan vendor:publish --tag=ux-progress --force
```
