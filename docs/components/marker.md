# Marker

Displays an inline status, system note, bordered row, or labeled separator in a conversation.

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker>
        <x-ux::marker.icon><x-ux::icon name="git-branch" /></x-ux::marker.icon>
        <x-ux::marker.content>Switched to a new branch</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker role="status">
        <x-ux::marker.icon><x-ux::spinner /></x-ux::marker.icon>
        <x-ux::marker.content class="shimmer">Thinking...</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="separator">
        <x-ux::marker.content>Conversation compacted</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="border">
        <x-ux::marker.icon><x-ux::icon name="search" /></x-ux::marker.icon>
        <x-ux::marker.content>Explored 4 files</x-ux::marker.content>
    </x-ux::marker>
</div>
```

Compose `x-ux::marker` with `x-ux::message` in a conversation thread.

## Usage

```blade
<x-ux::marker>
    <x-ux::marker.icon><x-ux::icon name="check" /></x-ux::marker.icon>
    <x-ux::marker.content>Explored 4 files</x-ux::marker.content>
</x-ux::marker>
```

## Composition

```text
x-ux::marker
├── x-ux::marker.icon
└── x-ux::marker.content
```

## Variants

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker>
        <x-ux::marker.content>A default marker for inline notes.</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="separator">
        <x-ux::marker.content>A separator marker</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="border">
        <x-ux::marker.content>A border marker for row boundaries.</x-ux::marker.content>
    </x-ux::marker>
</div>
```

## Status

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker role="status">
        <x-ux::marker.icon><x-ux::spinner /></x-ux::marker.icon>
        <x-ux::marker.content>Compacting conversation</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker role="status">
        <x-ux::marker.icon><x-ux::spinner /></x-ux::marker.icon>
        <x-ux::marker.content>Running tests</x-ux::marker.content>
    </x-ux::marker>
</div>
```

## Shimmer

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker role="status">
        <x-ux::marker.content class="shimmer">Thinking...</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker role="status">
        <x-ux::marker.content class="shimmer">Reading 4 files</x-ux::marker.content>
    </x-ux::marker>
</div>
```

## Separator

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker variant="separator"><x-ux::marker.content>Today</x-ux::marker.content></x-ux::marker>
    <x-ux::marker variant="separator"><x-ux::marker.content>Worked for 42s</x-ux::marker.content></x-ux::marker>
    <x-ux::marker variant="separator"><x-ux::marker.content>Conversation compacted</x-ux::marker.content></x-ux::marker>
</div>
```

## Border

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker variant="border">
        <x-ux::marker.icon><x-ux::icon name="git-branch" /></x-ux::marker.icon>
        <x-ux::marker.content>Switched to release-candidate</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="border">
        <x-ux::marker.icon><x-ux::icon name="search" /></x-ux::marker.icon>
        <x-ux::marker.content>Reviewed 8 related files</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker variant="border">
        <x-ux::marker.icon><x-ux::icon name="file-text" /></x-ux::marker.icon>
        <x-ux::marker.content>Opened implementation notes</x-ux::marker.content>
    </x-ux::marker>
</div>
```

## With Icon

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker>
        <x-ux::marker.icon><x-ux::icon name="git-branch" /></x-ux::marker.icon>
        <x-ux::marker.content>Switched to a new branch</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker>
        <x-ux::marker.icon><x-ux::icon name="search" /></x-ux::marker.icon>
        <x-ux::marker.content>Explored 4 files</x-ux::marker.content>
    </x-ux::marker>
    <x-ux::marker class="flex-col">
        <x-ux::marker.icon><x-ux::icon name="book-open-check" /></x-ux::marker.icon>
        <x-ux::marker.content>Syncing completed</x-ux::marker.content>
    </x-ux::marker>
</div>
```

## Links and Buttons

```blade preview
<div class="flex w-full max-w-sm flex-col gap-4">
    <x-ux::marker as-child>
        <a href="#"><x-ux::marker.content>View the pull request</x-ux::marker.content></a>
    </x-ux::marker>
    <x-ux::marker as-child>
        <button type="button">
            <x-ux::marker.icon><x-ux::icon name="rotate-ccw" /></x-ux::marker.icon>
            <x-ux::marker.content>Revert this change</x-ux::marker.content>
        </button>
    </x-ux::marker>
</div>
```

## API Reference

### x-ux::marker

| Prop | Type | Default |
| --- | --- | --- |
| `variant`  | `enum` [?"default" \| "border" \| "separator"] | `"default"` |
| `as-child` | `boolean`                                          | `false`     |

## Publishing

```shell
php artisan vendor:publish --tag=ux-marker --force
```
