# Card

Use Card to group one coherent subject, its supporting information, and related actions.

## Composition

```text
x-ux::card
├── x-ux::card.header
│   ├── x-ux::card.title
│   ├── x-ux::card.description
│   └── x-ux::card.action
├── x-ux::card.content
└── x-ux::card.footer
```

Keep Title, Description, and Action inside Header. Use Content for the primary body and Footer for final actions or secondary metadata.

## API

### `x-ux::card`

| Prop   | Type         | Default   | Purpose                         |
|--------|--------------|-----------|---------------------------------|
| `size` | `default\|sm` | `default` | Control the shared card spacing.|

All parts accept standard HTML attributes and Tailwind classes. Card exposes `--card-spacing`, which controls the section gap and the inset used by Header, Content, and Footer.

## Basic Card

```blade
<x-ux::card class="w-full max-w-sm">
    <x-ux::card.header>
        <x-ux::card.title>Project status</x-ux::card.title>
        <x-ux::card.description>Current delivery progress.</x-ux::card.description>
        <x-ux::card.action>
            <x-ux::button variant="ghost" size="icon" aria-label="Open project menu">
                <x-ux::icon name="ellipsis" />
            </x-ux::button>
        </x-ux::card.action>
    </x-ux::card.header>
    <x-ux::card.content>
        <p>All milestones are on schedule.</p>
    </x-ux::card.content>
    <x-ux::card.footer class="justify-end gap-2">
        <x-ux::button variant="outline">Cancel</x-ux::button>
        <x-ux::button>Continue</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

Omit unused parts. Do not render empty Header, Content, or Footer elements merely to preserve spacing.

## Size and Spacing

Use `size="sm"` for compact cards. The size changes the shared spacing and title size while preserving the same composition.

```blade
<x-ux::card size="sm" class="max-w-xs">
    <x-ux::card.header>
        <x-ux::card.title>Scheduled reports</x-ux::card.title>
        <x-ux::card.description>Weekly snapshots sent automatically.</x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.footer>
        <x-ux::button size="sm" class="w-full">Configure</x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

Set a custom spacing token only when neither built-in size fits:

```blade
<x-ux::card class="[--card-spacing:--spacing(6)]">
    {{-- card parts --}}
</x-ux::card>
```

Prefer the shared variable over applying unrelated padding to every part.

## Forms

Place form fields in Content and submission actions in Footer. The `<form>` must own the submit button semantically; either wrap the relevant card parts with the form or associate an external button through its `form` attribute.

```blade
<x-ux::card class="max-w-sm">
    <x-ux::card.header>
        <x-ux::card.title>Create project</x-ux::card.title>
        <x-ux::card.description>Enter the project details.</x-ux::card.description>
    </x-ux::card.header>
    <x-ux::card.content>
        <form id="create-project" wire:submit="save" class="grid gap-4">
            <x-ux::field>
                <x-ux::field.label for="project-name">Name</x-ux::field.label>
                <x-ux::input id="project-name" wire:model="name" />
                <x-ux::field.error name="name" />
            </x-ux::field>
        </form>
    </x-ux::card.content>
    <x-ux::card.footer class="justify-end">
        <x-ux::button form="create-project" type="submit" wire:loading.attr="disabled" wire:target="save">
            Save project
        </x-ux::button>
    </x-ux::card.footer>
</x-ux::card>
```

Keep Card parts as direct children. Associate a Footer submit button with the form in Content through matching `form` and `id` attributes.

## Edge-to-Edge Content

Use the shared spacing variable for media or scrollable content that reaches the card edges:

```blade
<x-ux::card.content class="-mb-(--card-spacing)">
    <div class="-mx-(--card-spacing) overflow-auto border-t px-(--card-spacing) py-4">
        {{ $content }}
    </div>
</x-ux::card.content>
```

Use `-mb-(--card-spacing)` only when edge-to-edge Content sits directly above Footer and the normal section gap must be removed.

## Images

Place a cover image before Header. Card removes its top padding when the first direct child is an image and rounds first and last images automatically.

```blade
<x-ux::card class="max-w-sm">
    <img src="{{ $event->cover_url }}" alt="{{ $event->name }}" class="aspect-video w-full object-cover" />
    <x-ux::card.header>
        <x-ux::card.title>{{ $event->name }}</x-ux::card.title>
    </x-ux::card.header>
</x-ux::card>
```

Use meaningful alternative text when the image conveys information. Use `alt=""` only for a purely decorative image.

## Accessibility and RTL

- Card is a visual container, not an interactive element. Do not add `role="button"` or click handlers to the root.
- Use semantic headings inside Title when the card participates in the page heading hierarchy: `<x-ux::card.title><h3>…</h3></x-ux::card.title>`.
- Give every icon-only Action an accessible name.
- Keep one clear primary action and avoid making the entire card clickable when it also contains buttons or links.
- Set `dir="rtl"` on Card or an ancestor for right-to-left content.
- Use logical utilities such as `ms-auto`, `ps-*`, and `pe-*` in application-specific card content.

## Avoid

- Do not recreate Card borders, radius, spacing, or footer treatment with a custom wrapper.
- Do not use hard-coded `px-*` independently on every Card part when `--card-spacing` should control them together.
- Do not place Action outside Header.
- Do not use Card for unrelated content that only happens to share a border.
- Do not nest interactive controls inside a clickable card root.
- Do not add JavaScript for Card layout; Card is a static primitive.
