# Tooltip

A popup that displays information related to an element when the element receives keyboard focus or the mouse hovers over it.

```blade preview
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <x-ux::button variant="outline">Hover</x-ux::button>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>Add to library</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## Usage

```blade
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <x-ux::button variant="outline">Hover</x-ux::button>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>Add to library</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## Composition

Use the following composition to build a `x-ux::tooltip`:

```text
x-ux::tooltip
├── x-ux::tooltip.trigger
└── x-ux::tooltip.content
```

## Side

Use the `side` prop to change the side of the tooltip.

```blade preview
<div class="flex flex-wrap gap-2">
    @foreach (['left', 'top', 'bottom', 'right'] as $side)
        <x-ux::tooltip>
            <x-ux::tooltip.trigger as-child>
                <x-ux::button variant="outline" class="w-fit capitalize">
                    {{ $side }}
                </x-ux::button>
            </x-ux::tooltip.trigger>
            <x-ux::tooltip.content :side="$side">
                <p>Add to library</p>
            </x-ux::tooltip.content>
        </x-ux::tooltip>
    @endforeach
</div>
```

## With Keyboard Shortcut

```blade preview
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <x-ux::button
            variant="outline"
            size="icon-sm"
            aria-label="Save changes"
        >
            <x-ux::icon name="save" />
        </x-ux::button>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        Save Changes <x-ux::kbd>S</x-ux::kbd>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## Disabled Button

Show a tooltip on a disabled button by wrapping it with a span.

```blade preview
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <span class="inline-block w-fit">
            <x-ux::button variant="outline" disabled>
                Disabled
            </x-ux::button>
        </span>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>This feature is currently unavailable</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## RTL

```blade preview
<x-ux::direction direction="rtl">
    <div class="flex flex-wrap gap-2">
        @foreach ([
            'left' => 'يسار',
            'top' => 'أعلى',
            'bottom' => 'أسفل',
            'right' => 'يمين',
        ] as $side => $label)
            <x-ux::tooltip>
                <x-ux::tooltip.trigger as-child>
                    <x-ux::button variant="outline" class="w-fit">
                        {{ $label }}
                    </x-ux::button>
                </x-ux::tooltip.trigger>
                <x-ux::tooltip.content :side="$side">
                    <p>إضافة إلى المكتبة</p>
                </x-ux::tooltip.content>
            </x-ux::tooltip>
        @endforeach
    </div>
</x-ux::direction>
```

## API Reference

### `x-ux::tooltip`

| Prop             | Type     | Default |
|------------------|----------|---------|
| `delay-duration` | `number` | `0`     |

### `x-ux::tooltip.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

### `x-ux::tooltip.content`

| Prop          | Type                                             | Default    |
|---------------|--------------------------------------------------|------------|
| `side`        | `enum` [?"top" \| "right" \| "bottom" \| "left"] | `"top"`    |
| `side-offset` | `number`                                         | `0`        |
| `align`       | `enum` [?"start" \| "center" \| "end"]           | `"center"` |

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling changes.

```shell
php artisan vendor:publish --tag=ux-tooltip --force
```
