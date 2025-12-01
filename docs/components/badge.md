# Badge

Displays a badge or a component that looks like a badge.

```blade preview
<div class="flex flex-col items-center gap-2">
    <div class="flex w-full flex-wrap gap-2">
        <x-ux::badge>Badge</x-ux::badge>
        <x-ux::badge variant="secondary">Secondary</x-ux::badge>
        <x-ux::badge variant="destructive">Destructive</x-ux::badge>
        <x-ux::badge variant="outline">Outline</x-ux::badge>
    </div>
    <div class="flex w-full flex-wrap gap-2">
        <x-ux::badge
            variant="secondary"
            class="bg-blue-500 text-white dark:bg-blue-600"
        >
            <x-ux::icon name="badge-check" />
            Verified
        </x-ux::badge>
        <x-ux::badge class="h-5 min-w-5 rounded-full px-1 font-mono tabular-nums">
            8
        </x-ux::badge>
        <x-ux::badge
            class="h-5 min-w-5 rounded-full px-1 font-mono tabular-nums"
            variant="destructive"
        >
            99
        </x-ux::badge>
        <x-ux::badge
            class="h-5 min-w-5 rounded-full px-1 font-mono tabular-nums"
            variant="outline"
        >
            20+
        </x-ux::badge>
    </div>
</div>
```

## Usage

```blade
<x-ux::badge variant="outline">Badge</x-ux::badge>
```

## Examples

### As Link

Display an HTML `a` tag as a badge bypassing the `href` prop.

```blade preview
<x-ux::badge href="https://www.google.com/" target="_blank">
    Google
</x-ux::badge>
```

## API Reference

| Prop      | Type                                                             | Default     |
|-----------|------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-badge --force
```
