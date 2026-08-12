# Aspect Ratio

Displays content within a desired ratio.

```blade preview
<x-ux::aspect-ratio :ratio="16 / 9" class="overflow-hidden rounded-lg bg-muted">
    <img
        src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&dpr=2&q=80"
        alt="Photo"
        class="h-full w-full object-cover"
    />
</x-ux::aspect-ratio>
```

## Usage

```blade
<x-ux::aspect-ratio :ratio="16 / 9">
    <img src="..." alt="Image" class="rounded-md object-cover" />
</x-ux::aspect-ratio>
```

## Square

A square aspect ratio component using the `:ratio="1 / 1"` prop. This is useful for displaying images in a square format.

```blade preview
<x-ux::aspect-ratio :ratio="1 / 1" class="overflow-hidden rounded-lg bg-muted">
    <img
        src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&dpr=2&q=80"
        alt="Photo"
        class="h-full w-full object-cover"
    />
</x-ux::aspect-ratio>
```

## Portrait

A portrait aspect ratio component using the `:ratio="9 / 16"` prop. This is useful for displaying images in a portrait format.

```blade preview
<x-ux::aspect-ratio :ratio="9 / 16" class="mx-auto max-w-sm overflow-hidden rounded-lg bg-muted">
    <img
        src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&dpr=2&q=80"
        alt="Photo"
        class="h-full w-full object-cover"
    />
</x-ux::aspect-ratio>
```

## RTL

Set `dir="rtl"` when the aspect ratio is displayed in a right-to-left interface.

```blade preview
<figure dir="rtl" class="w-full">
    <x-ux::aspect-ratio :ratio="16 / 9" class="overflow-hidden rounded-lg bg-muted">
        <img
            src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&dpr=2&q=80"
            alt="Photo"
            class="h-full w-full object-cover"
        />
    </x-ux::aspect-ratio>
    <figcaption class="mt-2 text-sm text-muted-foreground">
        منظر طبيعي جميل
    </figcaption>
</figure>
```

## API Reference

### x-ux::aspect-ratio

| Prop      | Type     | Default |
|-----------|----------|---------|
| `ratio*`  | `number` | -       |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-aspect-ratio --force
```
