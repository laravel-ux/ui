# Popover

Displays rich content in a portal, triggered by a button.

```blade preview
<x-ux::popover>
    <x-ux::popover.trigger as-child>
        <x-ux::button variant="outline">Open popover</x-ux::button>
    </x-ux::popover.trigger>
    <x-ux::popover.content class="w-80">
        <div class="grid gap-4">
            <div class="space-y-2">
                <h4 class="leading-none font-medium">Dimensions</h4>
                <p class="text-sm text-muted-foreground">
                    Set the dimensions for the layer.
                </p>
            </div>
            <div class="grid gap-2">
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="width">Width</x-ux::label>
                    <x-ux::input id="width" value="100%" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="maxWidth">Max. width</x-ux::label>
                    <x-ux::input id="maxWidth" value="300px" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="height">Height</x-ux::label>
                    <x-ux::input id="height" value="25px" class="col-span-2 h-8" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4">
                    <x-ux::label for="maxHeight">Max. height</x-ux::label>
                    <x-ux::input id="maxHeight" value="none" class="col-span-2 h-8" />
                </div>
            </div>
        </div>
    </x-ux::popover.content>
</x-ux::popover>
```

## Usage

```blade
<x-ux::popover>
    <x-ux::popover.trigger as-child>
        <x-ux::button variant="outline">Open Popover</x-ux::button>
    </x-ux::popover.trigger>
    <x-ux::popover.content>
        <x-ux::popover.header>
            <x-ux::popover.title>Title</x-ux::popover.title>
            <x-ux::popover.description>Description text here.</x-ux::popover.description>
        </x-ux::popover.header>
    </x-ux::popover.content>
</x-ux::popover>
```

## Composition

```text
x-ux::popover
├── x-ux::popover.trigger
└── x-ux::popover.content
    └── x-ux::popover.header
        ├── x-ux::popover.title
        └── x-ux::popover.description
```

## Align

Use `align` on `x-ux::popover.content` to control its alignment with the trigger.

```blade preview
<div class="flex flex-wrap justify-center gap-2">
    @foreach (['start', 'center', 'end'] as $align)
        <x-ux::popover>
            <x-ux::popover.trigger as-child>
                <x-ux::button variant="outline" class="capitalize">{{ $align }}</x-ux::button>
            </x-ux::popover.trigger>
            <x-ux::popover.content :align="$align">
                <x-ux::popover.header>
                    <x-ux::popover.title>{{ ucfirst($align) }}</x-ux::popover.title>
                    <x-ux::popover.description>
                        This popover is aligned to the {{ $align }} of its trigger.
                    </x-ux::popover.description>
                </x-ux::popover.header>
            </x-ux::popover.content>
        </x-ux::popover>
    @endforeach
</div>
```

## With Form

```blade preview
<x-ux::popover>
    <x-ux::popover.trigger as-child>
        <x-ux::button variant="outline">Open Popover</x-ux::button>
    </x-ux::popover.trigger>
    <x-ux::popover.content class="w-80 gap-4 p-4">
        <x-ux::popover.header>
            <x-ux::popover.title>Dimensions</x-ux::popover.title>
            <x-ux::popover.description>
                Set the dimensions for the layer.
            </x-ux::popover.description>
        </x-ux::popover.header>
        <x-ux::field.group class="gap-3">
            <x-ux::field orientation="horizontal">
                <x-ux::field.label for="width" class="w-1/3">Width</x-ux::field.label>
                <x-ux::input id="width" value="100%" />
            </x-ux::field>
            <x-ux::field orientation="horizontal">
                <x-ux::field.label for="height" class="w-1/3">Height</x-ux::field.label>
                <x-ux::input id="height" value="25px" />
            </x-ux::field>
        </x-ux::field.group>
    </x-ux::popover.content>
</x-ux::popover>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="flex flex-wrap justify-center gap-2">
        @foreach (['inline-start' => 'بداية السطر', 'top' => 'أعلى', 'bottom' => 'أسفل', 'inline-end' => 'نهاية السطر'] as $side => $label)
            <x-ux::popover>
                <x-ux::popover.trigger as-child>
                    <x-ux::button variant="outline">{{ $label }}</x-ux::button>
                </x-ux::popover.trigger>
                <x-ux::popover.content :side="$side">
                    <x-ux::popover.header>
                        <x-ux::popover.title>إعدادات العرض</x-ux::popover.title>
                        <x-ux::popover.description>يظهر المحتوى من جهة {{ $label }}.</x-ux::popover.description>
                    </x-ux::popover.header>
                </x-ux::popover.content>
            </x-ux::popover>
        @endforeach
    </div>
</x-ux::direction>
```

## API Reference

### x-ux::popover.trigger

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### x-ux::popover.content

| Prop          | Type                                                                          | Default    |
|---------------|-------------------------------------------------------------------------------|------------|
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left" \| "inline-start" \| "inline-end"] | `"bottom"` |
| `side-offset` | `number`                                                                      | `4`        |
| `align`       | `enum` [?"start" \| "center" \| "end"]                                | `"center"` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-popover --force
```
