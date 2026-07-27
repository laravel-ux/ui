# Separator

Visually or semantically separates content.

```blade preview
<div class="flex max-w-sm flex-col gap-4 text-sm">
    <div class="flex flex-col gap-1.5">
        <div class="leading-none font-medium">Laravel UX</div>
        <div class="text-muted-foreground">The foundation for your Laravel design system</div>
    </div>
    <x-ux::separator />
    <div>
        A set of beautifully designed components that you can customize, extend, and build on.
    </div>
</div>
```

## Usage

```blade
<x-ux::separator />
```

## Vertical

Use `orientation="vertical"` for a vertical separator.

```blade preview
<div class="flex h-5 items-center gap-4 text-sm">
    <div>Blog</div>
    <x-ux::separator orientation="vertical" />
    <div>Docs</div>
    <x-ux::separator orientation="vertical" />
    <div>Source</div>
</div>
```

## Menu

Use vertical separators between menu items with descriptions.

```blade preview
<div class="flex items-center gap-2 text-sm md:gap-4">
    <div class="flex flex-col gap-1">
        <span class="font-medium">Settings</span>
        <span class="text-xs text-muted-foreground">Manage preferences</span>
    </div>
    <x-ux::separator orientation="vertical" />
    <div class="flex flex-col gap-1">
        <span class="font-medium">Account</span>
        <span class="text-xs text-muted-foreground">Profile & security</span>
    </div>
    <x-ux::separator orientation="vertical" class="hidden md:block" />
    <div class="hidden flex-col gap-1 md:flex">
        <span class="font-medium">Help</span>
        <span class="text-xs text-muted-foreground">Support & docs</span>
    </div>
</div>
```

## List

Use horizontal separators between list items.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-2 text-sm">
    @foreach (range(1, 3) as $item)
        <dl class="flex items-center justify-between">
            <dt>Item {{ $item }}</dt>
            <dd class="text-muted-foreground">Value {{ $item }}</dd>
        </dl>
        @if (! $loop->last)
            <x-ux::separator />
        @endif
    @endforeach
</div>
```

## RTL

```blade preview
<div class="flex max-w-sm flex-col gap-4 text-sm" dir="rtl">
        <div class="flex flex-col gap-1.5">
            <div class="leading-none font-medium">Laravel UX</div>
            <div class="text-muted-foreground">الأساس لنظام التصميم الخاص بك</div>
        </div>
        <x-ux::separator />
        <div>مجموعة من المكونات المصممة بشكل جميل يمكنك تخصيصها وتوسيعها والبناء عليها.</div>
</div>
```

## API Reference

| Prop          | Type                                 | Default        |
|---------------|--------------------------------------|----------------|
| `orientation` | `enum` [?"horizontal" \| "vertical"] | `"horizontal"` |
| `decorative`  | `boolean`                            | `true`         |

Set `decorative` to `false` when the separator represents a meaningful boundary between sections. The component then renders with `role="separator"` and the matching `aria-orientation`.

## Publishing

```shell
php artisan vendor:publish --tag=ux-separator --force
```
