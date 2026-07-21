# Badge

Displays a badge or a component that looks like a badge.

```blade preview
<div class="flex w-full flex-wrap justify-center gap-2">
    <x-ux::badge>Badge</x-ux::badge>
    <x-ux::badge variant="secondary">Secondary</x-ux::badge>
    <x-ux::badge variant="destructive">Destructive</x-ux::badge>
    <x-ux::badge variant="outline">Outline</x-ux::badge>
</div>
```

## Usage

```blade
<x-ux::badge variant="default | outline | secondary | destructive">Badge</x-ux::badge>
```

## Examples

### Variants

Use the `variant` prop to change the variant of the badge.

```blade preview
<div class="flex flex-wrap gap-2">
    <x-ux::badge>Default</x-ux::badge>
    <x-ux::badge variant="secondary">Secondary</x-ux::badge>
    <x-ux::badge variant="destructive">Destructive</x-ux::badge>
    <x-ux::badge variant="outline">Outline</x-ux::badge>
    <x-ux::badge variant="ghost">Ghost</x-ux::badge>
</div>
```

### With Icon

You can render an icon inside the badge. Use `data-icon="inline-start"` to render the icon on the left and `data-icon="inline-end"` to render the icon on the right.

```blade preview
<div class="flex flex-wrap gap-2">
    <x-ux::badge variant="secondary">
        <x-ux::icon name="badge-check" data-icon="inline-start" />
        Verified
    </x-ux::badge>
    <x-ux::badge variant="outline">
        Bookmark
        <x-ux::icon name="bookmark" data-icon="inline-end" />
    </x-ux::badge>
</div>
```

### With Spinner

You can render a spinner inside the badge. Remember to add the `data-icon="inline-start"` or `data-icon="inline-end"` attribute to the spinner.

```blade preview
<div class="flex flex-wrap gap-2">
    <x-ux::badge variant="destructive">
        <x-ux::spinner data-icon="inline-start" />
        Deleting
    </x-ux::badge>
    <x-ux::badge variant="secondary">
        Generating
        <x-ux::spinner data-icon="inline-end" />
    </x-ux::badge>
</div>
```

### Link

Use the `href` attribute to render a link as a badge.

```blade preview
<x-ux::badge href="#link">
    Open Link
    <x-ux::icon name="arrow-up-right" data-icon="inline-end" />
</x-ux::badge>
```

### Custom Colors

You can customize the colors of a badge by adding custom classes such as `bg-green-50 dark:bg-green-800` to `x-ux::badge`.

```blade preview
<div class="flex flex-wrap gap-2">
    <x-ux::badge class="bg-blue-50 text-blue-700 dark:bg-blue-950 dark:text-blue-300">
        Blue
    </x-ux::badge>
    <x-ux::badge class="bg-green-50 text-green-700 dark:bg-green-950 dark:text-green-300">
        Green
    </x-ux::badge>
    <x-ux::badge class="bg-sky-50 text-sky-700 dark:bg-sky-950 dark:text-sky-300">
        Sky
    </x-ux::badge>
    <x-ux::badge class="bg-purple-50 text-purple-700 dark:bg-purple-950 dark:text-purple-300">
        Purple
    </x-ux::badge>
    <x-ux::badge class="bg-red-50 text-red-700 dark:bg-red-950 dark:text-red-300">
        Red
    </x-ux::badge>
</div>
```

### RTL

To enable right-to-left support, set the `dir="rtl"` attribute on a parent element.

```blade preview
<div dir="rtl" class="flex w-full flex-wrap justify-center gap-2">
    <x-ux::badge>شارة</x-ux::badge>
    <x-ux::badge variant="secondary">ثانوي</x-ux::badge>
    <x-ux::badge variant="destructive">مدمر</x-ux::badge>
    <x-ux::badge variant="outline">مخطط</x-ux::badge>
    <x-ux::badge variant="secondary">
        <x-ux::icon name="badge-check" data-icon="inline-start" />
        متحقق
    </x-ux::badge>
    <x-ux::badge variant="outline">
        إشارة مرجعية
        <x-ux::icon name="bookmark" data-icon="inline-end" />
    </x-ux::badge>
</div>
```

## API Reference

| Prop      | Type                                                                                          | Default     |
|-----------|-----------------------------------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "secondary" \| "destructive" \| "outline" \| "ghost" \| "link"] | `"default"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-badge --force
```
