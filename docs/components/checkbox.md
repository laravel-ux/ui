# Checkbox

A control that allows the user to toggle between checked and not checked.

```blade preview
<div class="flex flex-col gap-6">
    <div class="flex items-center gap-3">
        <x-ux::checkbox id="terms" />
        <x-ux::label for="terms">Accept terms and conditions</x-ux::label>
    </div>
    <div class="flex items-start gap-3">
        <x-ux::checkbox id="terms-2" checked />
        <div class="grid gap-2">
            <x-ux::label for="terms-2">Accept terms and conditions</x-ux::label>
            <p class="text-muted-foreground text-sm">
                By clicking this checkbox, you agree to the terms and conditions.
            </p>
        </div>
    </div>
    <div class="flex items-start gap-3">
        <x-ux::checkbox id="toggle" disabled />
        <x-ux::label for="toggle">Enable notifications</x-ux::label>
    </div>
    <x-ux::label class="hover:bg-accent/50 flex items-start gap-3 rounded-lg border p-3 has-[[aria-checked=true]]:border-blue-600 has-[[aria-checked=true]]:bg-blue-50 dark:has-[[aria-checked=true]]:border-blue-900 dark:has-[[aria-checked=true]]:bg-blue-950">
        <x-ux::checkbox
            id="toggle-2"
            checked
            class="data-[state=checked]:border-blue-600 data-[state=checked]:bg-blue-600 data-[state=checked]:text-white dark:data-[state=checked]:border-blue-700 dark:data-[state=checked]:bg-blue-700"
        />
        <div class="grid gap-1.5 font-normal">
            <p class="text-sm leading-none font-medium">
                Enable notifications
            </p>
            <p class="text-muted-foreground text-sm">
                You can enable or disable notifications at any time.
            </p>
        </div>
    </x-ux::label>
</div>
```

## Usage

```blade
<x-ux::checkbox />
```

## API Reference

| Prop                                                      | Type      | Default |
|-----------------------------------------------------------|-----------|---------|
| `checked`[?The controlled checked state of the checkbox.] | `boolean` | `false` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-checkbox --force
```
