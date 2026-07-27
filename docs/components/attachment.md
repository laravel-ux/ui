# Attachment

Displays a file or image attachment with media, metadata, upload state, and actions.

```blade preview
<div class="mx-auto flex w-full max-w-sm flex-col gap-3 py-12">
    <x-ux::attachment.group>
        @foreach([
            ['workspace.png', 'PNG · 820 KB', 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&auto=format&fit=crop&q=80', 'Workspace'],
            ['desk-reference.jpg', 'JPG · 1.1 MB', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=900&auto=format&fit=crop&q=80', 'Desk'],
            ['office-reference.jpg', 'JPG · 940 KB', 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&auto=format&fit=crop&q=80', 'Office'],
        ] as [$name, $meta, $src, $alt])
            <x-ux::attachment orientation="vertical">
                <x-ux::attachment.media variant="image"><img src="{{ $src }}" alt="{{ $alt }}" /></x-ux::attachment.media>
                <x-ux::attachment.content>
                    <x-ux::attachment.title>{{ $name }}</x-ux::attachment.title>
                    <x-ux::attachment.description>{{ $meta }}</x-ux::attachment.description>
                </x-ux::attachment.content>
            </x-ux::attachment>
        @endforeach
    </x-ux::attachment.group>
    <x-ux::attachment state="uploading" class="w-full">
        <x-ux::attachment.media><x-ux::spinner /></x-ux::attachment.media>
        <x-ux::attachment.content>
            <x-ux::attachment.title>sales-dashboard.pdf</x-ux::attachment.title>
            <x-ux::attachment.description>Uploading · 64%</x-ux::attachment.description>
        </x-ux::attachment.content>
        <x-ux::attachment.actions>
            <x-ux::attachment.action aria-label="Cancel upload"><x-ux::icon name="x" /></x-ux::attachment.action>
        </x-ux::attachment.actions>
    </x-ux::attachment>
    <x-ux::attachment class="w-full">
        <x-ux::attachment.media><x-ux::icon name="file-code" /></x-ux::attachment.media>
        <x-ux::attachment.content>
            <x-ux::attachment.title>message-renderer.blade.php</x-ux::attachment.title>
            <x-ux::attachment.description>Blade · 12 KB</x-ux::attachment.description>
        </x-ux::attachment.content>
        <x-ux::attachment.actions>
            <x-ux::attachment.action aria-label="Remove message-renderer.blade.php"><x-ux::icon name="x" /></x-ux::attachment.action>
        </x-ux::attachment.actions>
    </x-ux::attachment>
</div>
```

The `x-ux::attachment` component displays a file or image attachment, its media, name, and metadata, with optional actions and upload state. Use it for files and images in chat composers, message threads, and upload lists.

## Usage

```blade
<x-ux::attachment>
    <x-ux::attachment.media><x-ux::icon name="file-text" /></x-ux::attachment.media>
    <x-ux::attachment.content>
        <x-ux::attachment.title>sales-dashboard.pdf</x-ux::attachment.title>
        <x-ux::attachment.description>PDF · 2.4 MB</x-ux::attachment.description>
    </x-ux::attachment.content>
    <x-ux::attachment.actions>
        <x-ux::attachment.action aria-label="Remove sales-dashboard.pdf"><x-ux::icon name="x" /></x-ux::attachment.action>
    </x-ux::attachment.actions>
</x-ux::attachment>
```

## Composition

```text
x-ux::attachment
├── x-ux::attachment.media
├── x-ux::attachment.content
│   ├── x-ux::attachment.title
│   └── x-ux::attachment.description
├── x-ux::attachment.actions
│   └── x-ux::attachment.action
└── x-ux::attachment.trigger
```

```text
x-ux::attachment.group
├── x-ux::attachment
└── x-ux::attachment
```

## Features

- Icon and image media through `x-ux::attachment.media`
- Upload states: `idle`, `uploading`, `processing`, `error`, and `done` with built-in styling
- Three sizes and horizontal or vertical orientation
- A full-card `x-ux::attachment.trigger` that opens a link or dialog while the actions stay independently clickable
- Scrollable, snapping `x-ux::attachment.group` with an edge fade
- Customizable styling through the `class` attribute on every part

## Image

Set `variant="image"` on `x-ux::attachment.media` and render an `<img>` inside it. Use `orientation="vertical"` to stack the media above the content.

```blade preview
<div class="mx-auto w-full max-w-sm py-12">
    <x-ux::attachment.group class="w-full">
        @foreach([
            ['workspace.png', 'PNG · 820 KB', 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&auto=format&fit=crop&q=80', 'Workspace'],
            ['desk-reference.jpg', 'JPG · 1.1 MB', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?w=900&auto=format&fit=crop&q=80', 'Desk'],
            ['office-reference.jpg', 'JPG · 940 KB', 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&auto=format&fit=crop&q=80', 'Office'],
        ] as [$name, $meta, $src, $alt])
            <x-ux::attachment orientation="vertical">
                <x-ux::attachment.media variant="image"><img src="{{ $src }}" alt="{{ $alt }}" /></x-ux::attachment.media>
                <x-ux::attachment.content>
                    <x-ux::attachment.title>{{ $name }}</x-ux::attachment.title>
                    <x-ux::attachment.description>{{ $meta }}</x-ux::attachment.description>
                </x-ux::attachment.content>
                <x-ux::attachment.actions>
                    <x-ux::attachment.action aria-label="Remove {{ $name }}"><x-ux::icon name="x" /></x-ux::attachment.action>
                </x-ux::attachment.actions>
                <x-ux::attachment.trigger as-child>
                    <a href="{{ $src }}" target="_blank" rel="noreferrer" aria-label="Open {{ $name }}"></a>
                </x-ux::attachment.trigger>
            </x-ux::attachment>
        @endforeach
    </x-ux::attachment.group>
</div>
```

## States

Set `state` to reflect the upload lifecycle. `error` switches to a destructive treatment.

```blade preview
<div class="mx-auto flex w-full max-w-sm flex-col gap-2 py-12">
    @foreach([
        ['idle', 'clock', 'selected-file.pdf', 'Ready to upload'],
        ['uploading', 'loader-circle', 'design-system.zip', 'Uploading · 64%'],
        ['processing', 'file-text', 'market-research.pdf', 'Processing document'],
        ['error', 'triangle-alert', 'financial-model.xlsx', 'Upload failed. Try again.'],
        ['done', 'check', 'uploaded-report.pdf', 'Uploaded · 1.8 MB'],
    ] as [$state, $icon, $name, $description])
        <x-ux::attachment :$state class="w-full">
            <x-ux::attachment.media>
                @if($state === 'uploading') <x-ux::spinner /> @else <x-ux::icon :name="$icon" /> @endif
            </x-ux::attachment.media>
            <x-ux::attachment.content>
                <x-ux::attachment.title>{{ $name }}</x-ux::attachment.title>
                <x-ux::attachment.description>{{ $description }}</x-ux::attachment.description>
            </x-ux::attachment.content>
            <x-ux::attachment.actions>
                @if($state === 'error')
                    <x-ux::attachment.action aria-label="Retry upload"><x-ux::icon name="refresh-cw" /></x-ux::attachment.action>
                @endif
                <x-ux::attachment.action aria-label="Remove {{ $name }}"><x-ux::icon name="x" /></x-ux::attachment.action>
            </x-ux::attachment.actions>
        </x-ux::attachment>
    @endforeach
</div>
```

## Sizes

Use `size` to switch between `default`, `sm`, and `xs`.

```blade preview
<div class="mx-auto flex w-full max-w-sm flex-col gap-3 py-12">
    <x-ux::attachment size="default" class="w-full">
        <x-ux::attachment.media><x-ux::icon name="file-text" /></x-ux::attachment.media>
        <x-ux::attachment.content><x-ux::attachment.title>Default attachment</x-ux::attachment.title><x-ux::attachment.description>PDF · 2.4 MB</x-ux::attachment.description></x-ux::attachment.content>
    </x-ux::attachment>
    <x-ux::attachment size="sm" class="w-full">
        <x-ux::attachment.media><x-ux::icon name="file-text" /></x-ux::attachment.media>
        <x-ux::attachment.content><x-ux::attachment.title>Small attachment</x-ux::attachment.title><x-ux::attachment.description>PDF · 2.4 MB</x-ux::attachment.description></x-ux::attachment.content>
    </x-ux::attachment>
    <x-ux::attachment size="xs" class="w-full">
        <x-ux::attachment.media><x-ux::icon name="file-text" /></x-ux::attachment.media>
        <x-ux::attachment.content><x-ux::attachment.title>Extra small attachment</x-ux::attachment.title></x-ux::attachment.content>
    </x-ux::attachment>
</div>
```

## Group

Wrap attachments in `x-ux::attachment.group` to lay them out in a horizontally scrollable, snapping row with an edge fade.

```blade preview
<div class="mx-auto w-full max-w-sm py-12">
    <x-ux::attachment.group class="w-full">
        @foreach([
            ['briefing-notes.pdf', 'PDF · 1.4 MB', 'file-text'],
            ['workspace.png', 'PNG · 820 KB', 'image'],
            ['customers.csv', 'CSV · 18 KB', 'table'],
            ['renderer.blade.php', 'Blade · 12 KB', 'file-code'],
        ] as [$name, $meta, $icon])
            <x-ux::attachment class="w-64">
                @if($icon === 'image')
                    <x-ux::attachment.media variant="image"><img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&auto=format&fit=crop&q=80" alt="workspace.png" /></x-ux::attachment.media>
                @else
                    <x-ux::attachment.media><x-ux::icon :name="$icon" /></x-ux::attachment.media>
                @endif
                <x-ux::attachment.content><x-ux::attachment.title>{{ $name }}</x-ux::attachment.title><x-ux::attachment.description>{{ $meta }}</x-ux::attachment.description></x-ux::attachment.content>
                <x-ux::attachment.actions><x-ux::attachment.action aria-label="Remove {{ $name }}"><x-ux::icon name="x" /></x-ux::attachment.action></x-ux::attachment.actions>
            </x-ux::attachment>
        @endforeach
    </x-ux::attachment.group>
</div>
```

## Trigger

Add an `x-ux::attachment.trigger` to make the whole card open a link or dialog. It fills the card behind the actions, so the actions stay clickable.

```blade preview
<div class="mx-auto w-full max-w-sm py-12">
    <x-ux::dialog>
        <x-ux::attachment class="w-full">
            <x-ux::attachment.media><x-ux::icon name="file-search" /></x-ux::attachment.media>
            <x-ux::attachment.content><x-ux::attachment.title>research-summary.pdf</x-ux::attachment.title><x-ux::attachment.description>Open preview dialog</x-ux::attachment.description></x-ux::attachment.content>
            <x-ux::attachment.actions>
                <x-ux::attachment.action aria-label="Copy link"><x-ux::icon name="copy" /></x-ux::attachment.action>
                <x-ux::attachment.action aria-label="Remove research-summary.pdf"><x-ux::icon name="x" /></x-ux::attachment.action>
            </x-ux::attachment.actions>
            <x-ux::dialog.trigger as-child><x-ux::attachment.trigger aria-label="Preview research-summary.pdf" /></x-ux::dialog.trigger>
        </x-ux::attachment>
        <x-ux::dialog.content class="sm:max-w-md">
            <x-ux::dialog.header><x-ux::dialog.title>research-summary.pdf</x-ux::dialog.title><x-ux::dialog.description>The attachment trigger fills the card and opens the dialog, while the actions stay independently clickable above it.</x-ux::dialog.description></x-ux::dialog.header>
        </x-ux::dialog.content>
    </x-ux::dialog>
</div>
```

## Accessibility

`x-ux::attachment.action` renders a Button, and `x-ux::attachment.trigger` renders a real `<button>` or your element via `as-child`.

### Label icon-only actions

Give every icon-only action an `aria-label` describing the action and its target.

```blade
<x-ux::attachment.action aria-label="Remove sales-dashboard.pdf"><x-ux::icon name="x" /></x-ux::attachment.action>
```

### Label the trigger

The trigger covers the card with no text of its own, so give it an `aria-label` for what activating it does.

```blade
<x-ux::attachment.trigger as-child>
    <a href="{{ $url }}" target="_blank" rel="noreferrer" aria-label="Open workspace.png"></a>
</x-ux::attachment.trigger>
```

The trigger sits behind the actions in the stacking order, so an action and the trigger remain separately focusable and clickable.

### Keyboard scrolling

When attachments are interactive, keyboard users reach off-screen items by tabbing to them. For presentational attachments, make the group focusable and scrollable with `tabindex="0"`, `role="group"`, and an `aria-label`.

### Meaning beyond color

Keep the failure reason in `x-ux::attachment.description` so the error state is not conveyed by color alone.

## API Reference

### `x-ux::attachment`

| Prop          | Type                                                                   | Default        |
|---------------|------------------------------------------------------------------------|----------------|
| `state`       | `enum` [?"idle" \| "uploading" \| "processing" \| "error" \| "done"] | `"done"`       |
| `size`        | `enum` [?"default" \| "sm" \| "xs"]                              | `"default"`    |
| `orientation` | `enum` [?"horizontal" \| "vertical"]                               | `"horizontal"` |

### `x-ux::attachment.media`

| Prop      | Type                              | Default  |
|-----------|-----------------------------------|----------|
| `variant` | `enum` [?"icon" \| "image"]   | `"icon"` |

### `x-ux::attachment.action`

| Prop      | Type                                                                                              | Default     |
|-----------|---------------------------------------------------------------------------------------------------|-------------|
| `variant` | `enum` [?"default" \| "outline" \| "ghost" \| "destructive" \| "secondary" \| "link"] | `"ghost"`   |
| `size`    | `enum` [?"default" \| "xs" \| "sm" \| "lg" \| "icon" \| "icon-xs" \| "icon-sm" \| "icon-lg"] | `"icon-xs"` |

### `x-ux::attachment.trigger`

| Prop       | Type      | Default |
|------------|-----------|---------|
| `as-child` | `boolean` | `false` |

## Publishing

```shell
php artisan vendor:publish --tag=ux-attachment --force
```
