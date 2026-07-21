# Attachment

Use Attachment to display a selected, uploading, processed, failed, or completed file with optional media, metadata, actions, and a full-card trigger. Attachment is presentational: application code owns upload progress and lifecycle state.

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

x-ux::attachment.group
└── x-ux::attachment
```

## API

### `x-ux::attachment`

| Prop | Values | Default | Purpose |
|---|---|---|---|
| `state` | `idle`, `uploading`, `processing`, `error`, `done` | `done` | Style the current lifecycle state. |
| `size` | `default`, `sm`, `xs` | `default` | Set the card density. |
| `orientation` | `horizontal`, `vertical` | `horizontal` | Place media beside or above content. |

### `x-ux::attachment.media`

| Prop | Values | Default | Purpose |
|---|---|---|---|
| `variant` | `icon`, `image` | `icon` | Render an icon treatment or an image preview. |

### `x-ux::attachment.action`

Accept Button `variant` and `size`; defaults are `ghost` and `icon-xs`. Pass an `aria-label` to every icon-only action.

### `x-ux::attachment.trigger`

| Prop | Type | Default | Purpose |
|---|---|---|---|
| `as-child` | boolean | `false` | Merge the overlay trigger into one link or another interactive child. |

Content, Title, Description, Actions, and Group have no custom props. Every part accepts standard HTML attributes and Tailwind classes.

## Basic File

```blade
<x-ux::attachment class="w-full">
    <x-ux::attachment.media>
        <x-ux::icon name="file-text" />
    </x-ux::attachment.media>
    <x-ux::attachment.content>
        <x-ux::attachment.title>sales-dashboard.pdf</x-ux::attachment.title>
        <x-ux::attachment.description>PDF · 2.4 MB</x-ux::attachment.description>
    </x-ux::attachment.content>
    <x-ux::attachment.actions>
        <x-ux::attachment.action
            wire:click="removeAttachment"
            aria-label="Remove sales-dashboard.pdf"
        >
            <x-ux::icon name="x" />
        </x-ux::attachment.action>
    </x-ux::attachment.actions>
</x-ux::attachment>
```

## Upload State

Derive `state` from application state. Do not add component-owned upload JavaScript.

```blade
<x-ux::attachment :state="$uploadState" class="w-full" wire:key="attachment-{{ $fileId }}">
    <x-ux::attachment.media>
        @if(in_array($uploadState, ['uploading', 'processing'], true))
            <x-ux::spinner />
        @else
            <x-ux::icon :name="$uploadState === 'error' ? 'triangle-alert' : 'file-text'" />
        @endif
    </x-ux::attachment.media>
    <x-ux::attachment.content>
        <x-ux::attachment.title>{{ $filename }}</x-ux::attachment.title>
        <x-ux::attachment.description>{{ $statusText }}</x-ux::attachment.description>
    </x-ux::attachment.content>
    <x-ux::attachment.actions>
        @if($uploadState === 'error')
            <x-ux::attachment.action wire:click="retryUpload" aria-label="Retry {{ $filename }}">
                <x-ux::icon name="refresh-cw" />
            </x-ux::attachment.action>
        @endif
        <x-ux::attachment.action wire:click="removeAttachment" aria-label="Remove {{ $filename }}">
            <x-ux::icon name="x" />
        </x-ux::attachment.action>
    </x-ux::attachment.actions>
</x-ux::attachment>
```

Keep a human-readable failure reason in Description when `state="error"`; color alone must not communicate failure.

## Images and Groups

Use vertical orientation for compact image thumbnails. Provide meaningful image `alt` text, or `alt=""` when the title already conveys the same information.

```blade
<x-ux::attachment.group aria-label="Selected images">
    @foreach($images as $image)
        <x-ux::attachment orientation="vertical" wire:key="image-{{ $image->id }}">
            <x-ux::attachment.media variant="image">
                <img src="{{ $image->thumbnail_url }}" alt="{{ $image->alt }}" />
            </x-ux::attachment.media>
            <x-ux::attachment.content>
                <x-ux::attachment.title>{{ $image->name }}</x-ux::attachment.title>
                <x-ux::attachment.description>{{ $image->size }}</x-ux::attachment.description>
            </x-ux::attachment.content>
        </x-ux::attachment>
    @endforeach
</x-ux::attachment.group>
```

Group already provides horizontal overflow, snap points, hidden scrollbars, RTL-aware edge fade, and overscroll containment. For a group without interactive children, add `tabindex="0"`, `role="group"`, and an `aria-label` so keyboard users can scroll it.

## Full-card Trigger

Use Trigger for a preview or navigation target. It sits below Actions in the stacking order.

```blade
<x-ux::attachment>
    {{-- media, content, and actions --}}
    <x-ux::attachment.trigger as-child>
        <a
            href="{{ $downloadUrl }}"
            target="_blank"
            rel="noreferrer"
            aria-label="Open {{ $filename }}"
        ></a>
    </x-ux::attachment.trigger>
</x-ux::attachment>
```

Use `x-ux::dialog.trigger as-child` around a default Attachment Trigger when opening an `x-ux::dialog`. Do not place a link or button inside the default button without `as-child`.

## Accessibility and Behavior

- Describe the target in every icon-only Action `aria-label`, such as “Remove report.pdf”, not only “Remove”.
- Label Trigger with the result of activation, such as “Preview report.pdf” or “Open image.png”.
- Keep Actions and Trigger as separate interactive elements; do not wrap the entire Attachment in a link.
- Use `state="error"` together with visible failure text.
- Preserve filename truncation, but make the full filename available elsewhere when distinguishing similar files matters.
- Use `aria-live` on an application-owned status region when upload changes must be announced; do not make every Attachment live by default.

## Avoid

- Do not use Attachment as the file picker itself; pair it with an input or dropzone.
- Do not calculate or simulate upload progress inside the component.
- Do not add a JavaScript plugin for visual states; bind `state` from Livewire or Alpine only when needed.
- Do not nest Button inside Attachment Trigger.
- Do not omit `alt` from image previews or `aria-label` from icon-only controls.
- Do not render an unbounded list in one Group; constrain the data or use a list layout for many files.
