# Hover Card

For sighted users to preview content available behind a link.

```blade preview
<x-ux::hover-card>
    <x-ux::hover-card.trigger>
        <x-ux::button variant="link">@nextjs</x-ux::button>
    </x-ux::hover-card.trigger>
    <x-ux::hover-card.content class="w-80">
        <div class="flex justify-between gap-4">
            <x-ux::avatar>
                <x-ux::avatar.image src="https://github.com/vercel.png" />
                <x-ux::avatar.fallback>VC</x-ux::avatar.fallback>
            </x-ux::avatar>
            <div class="space-y-1">
                <h4 class="text-sm font-semibold">@nextjs</h4>
                <p class="text-sm">
                    The React Framework – created and maintained by @vercel.
                </p>
                <div class="text-muted-foreground text-xs">
                    Joined December 2021
                </div>
            </div>
        </div>
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Usage

```blade
<x-ux::hover-card>
    <x-ux::hover-card.trigger>Hover</x-ux::hover-card.trigger>
    <x-ux::hover-card.content>
        The React Framework – created and maintained by @vercel.
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## API Reference

### x-ux::hover-card.content

The component that pops out when the hover card is open.

| Prop                                                                     | Type                                             | Default    |
|--------------------------------------------------------------------------|--------------------------------------------------|------------|
| `side` [?The preferred side of the trigger to render against when open.] | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"top"`    |
| `side-offset` [?The distance in pixels from the trigger.]                | `number`                                         | `4`        |
| `align` [?The preferred alignment against the trigger.]                  | `enum` [?"start" \| "center" \| "end"]           | `"center"` |

## Publishing

This component works out of the box, but you can publish its Blade view if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-hover-card --force
```
