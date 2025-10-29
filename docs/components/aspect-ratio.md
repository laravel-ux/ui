# Aspect Ratio

Displays content within a desired ratio.

```blade preview
<x-ux::aspect-ratio :ratio=16/9 class="bg-muted rounded-lg">
    <img
        src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=800&dpr=2&q=80"
        alt="Photo by Drew Beamer"
        fill
        class="h-full w-full rounded-lg object-cover dark:brightness-[0.2] dark:grayscale"
    />
</x-ux::aspect-ratio>
```

## Usage

```blade
<x-ux::aspect-ratio :ratio=16/9>
    <img src="..." alt="Image" class="rounded-md object-cover" />
</x-ux::aspect-ratio>
```

## API Reference

| Prop    | Type     | Default |
|---------|----------|---------|
| `ratio` | `number` | `1`     |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-aspect-ratio --force
```
