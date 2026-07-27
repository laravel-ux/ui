# Tooltip

Use `x-ux::tooltip` to display information related to an element when it receives pointer hover or keyboard focus.

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

```text
x-ux::tooltip
├── x-ux::tooltip.trigger
└── x-ux::tooltip.content
```

## Side

Set `side` on `x-ux::tooltip.content` to `top`, `right`, `bottom`, or `left`.

## Keyboard Shortcut

Use `x-ux::kbd` inside the content to show a shortcut.

```blade
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <x-ux::button variant="outline" size="icon-sm" aria-label="Save changes">
            <x-ux::icon name="save" />
        </x-ux::button>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        Save Changes <x-ux::kbd>S</x-ux::kbd>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## Disabled Button

Wrap a disabled button in a span so the tooltip trigger can receive pointer events.

```blade
<x-ux::tooltip>
    <x-ux::tooltip.trigger as-child>
        <span class="inline-block w-fit">
            <x-ux::button variant="outline" disabled>Disabled</x-ux::button>
        </span>
    </x-ux::tooltip.trigger>
    <x-ux::tooltip.content>
        <p>This feature is currently unavailable</p>
    </x-ux::tooltip.content>
</x-ux::tooltip>
```

## RTL

Tooltip content is teleported to `body`. Wrap the composition in `x-ux::direction` so the portal receives the direction.

```blade
<x-ux::direction direction="rtl">
    <x-ux::tooltip>
        <x-ux::tooltip.trigger as-child>
            <x-ux::button variant="outline">يمين</x-ux::button>
        </x-ux::tooltip.trigger>
        <x-ux::tooltip.content side="right">
            <p>إضافة إلى المكتبة</p>
        </x-ux::tooltip.content>
    </x-ux::tooltip>
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

| Prop          | Type                             | Default  |
|---------------|----------------------------------|----------|
| `side`        | `top`, `right`, `bottom`, `left` | `top`    |
| `side-offset` | `number`                         | `0`      |
| `align`       | `start`, `center`, `end`         | `center` |
