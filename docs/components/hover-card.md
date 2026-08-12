# Hover Card

For sighted users to preview content available behind a link.

```blade preview
<x-ux::hover-card>
    <x-ux::hover-card.trigger :delay="10" :close-delay="100" as-child>
        <x-ux::button variant="link">Hover Here</x-ux::button>
    </x-ux::hover-card.trigger>
    <x-ux::hover-card.content class="flex w-64 flex-col gap-0.5">
        <div class="font-semibold">@laravel</div>
        <div>The PHP framework for web artisans.</div>
        <div class="mt-1 text-xs text-muted-foreground">
            Released June 2011
        </div>
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Usage

```blade
<x-ux::hover-card>
    <x-ux::hover-card.trigger>Hover</x-ux::hover-card.trigger>
    <x-ux::hover-card.content>
        The PHP framework for web artisans.
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Composition

```text
x-ux::hover-card
├── x-ux::hover-card.trigger
└── x-ux::hover-card.content
```

## Trigger Delays

Use `delay` and `close-delay` on x-ux::hover-card.trigger to control when the card opens and closes.

```blade
<x-ux::hover-card>
    <x-ux::hover-card.trigger :delay="100" :close-delay="200">
        Hover
    </x-ux::hover-card.trigger>
    <x-ux::hover-card.content>Content</x-ux::hover-card.content>
</x-ux::hover-card>
```

## Positioning

Use `side` and `align` on x-ux::hover-card.content to control placement.

```blade
<x-ux::hover-card>
    <x-ux::hover-card.trigger>Hover</x-ux::hover-card.trigger>
    <x-ux::hover-card.content side="top" align="start">
        Content
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Basic

```blade preview
<x-ux::hover-card>
    <x-ux::hover-card.trigger :delay="10" :close-delay="100" as-child>
        <x-ux::button variant="link">Hover Here</x-ux::button>
    </x-ux::hover-card.trigger>
    <x-ux::hover-card.content class="flex w-64 flex-col gap-0.5">
        <div class="font-semibold">@laravel</div>
        <div>The PHP framework for web artisans.</div>
        <div class="mt-1 text-xs text-muted-foreground">
            Released June 2011
        </div>
    </x-ux::hover-card.content>
</x-ux::hover-card>
```

## Sides

```blade preview
<div class="flex flex-wrap justify-center gap-2">
    @foreach (['left', 'top', 'bottom', 'right'] as $side)
        <x-ux::hover-card>
            <x-ux::hover-card.trigger :delay="100" :close-delay="100" as-child>
                <x-ux::button variant="outline" class="capitalize">{{ $side }}</x-ux::button>
            </x-ux::hover-card.trigger>
            <x-ux::hover-card.content :side="$side">
                <div class="flex flex-col gap-1">
                    <h4 class="font-medium">Hover Card</h4>
                    <p>This hover card appears on the {{ $side }} side of the trigger.</p>
                </div>
            </x-ux::hover-card.content>
        </x-ux::hover-card>
    @endforeach
</div>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="grid gap-4">
        <div class="flex flex-wrap justify-center gap-2">
            @foreach (['left' => 'يسار', 'top' => 'أعلى', 'bottom' => 'أسفل', 'right' => 'يمين'] as $side => $label)
                <x-ux::hover-card>
                    <x-ux::hover-card.trigger :delay="10" :close-delay="100" as-child>
                        <x-ux::button variant="outline">{{ $label }}</x-ux::button>
                    </x-ux::hover-card.trigger>
                    <x-ux::hover-card.content :side="$side" class="flex w-64 flex-col gap-1">
                        <div class="font-semibold">سماعات لاسلكية</div>
                        <div class="text-sm text-muted-foreground">٩٩.٩٩ $</div>
                    </x-ux::hover-card.content>
                </x-ux::hover-card>
            @endforeach
        </div>
        <div class="flex flex-wrap justify-center gap-2">
            @foreach (['inline-start' => 'بداية السطر', 'inline-end' => 'نهاية السطر'] as $side => $label)
                <x-ux::hover-card>
                    <x-ux::hover-card.trigger :delay="10" :close-delay="100" as-child>
                        <x-ux::button variant="outline">{{ $label }}</x-ux::button>
                    </x-ux::hover-card.trigger>
                    <x-ux::hover-card.content :side="$side" class="flex w-64 flex-col gap-1">
                        <div class="font-semibold">سماعات لاسلكية</div>
                        <div class="text-sm text-muted-foreground">٩٩.٩٩ $</div>
                    </x-ux::hover-card.content>
                </x-ux::hover-card>
            @endforeach
        </div>
    </div>
</x-ux::direction>
```

## API Reference

### x-ux::hover-card.trigger

| Prop          | Type      | Default |
|---------------|-----------|---------|
| `as-child`    | `boolean` | `false` |
| `delay`       | `number`  | `600`   |
| `close-delay` | `number`  | `300`   |

### x-ux::hover-card.content

| Prop          | Type                                             | Default    |
|---------------|--------------------------------------------------|------------|
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left" \| "inline-start" \| "inline-end"] | `"bottom"` |
| `side-offset` | `number`                                         | `4`        |
| `align`       | `enum` [?"start" \| "center" \| "end"]           | `"center"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-hover-card --force
```
