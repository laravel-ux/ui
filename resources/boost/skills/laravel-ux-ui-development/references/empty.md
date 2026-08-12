# Empty

Use Empty to present a missing, unavailable, or not-yet-created resource with an optional action. Keep messages concise
and action-oriented.

## Composition

```text
x-ux::empty
├── x-ux::empty.header
│   ├── x-ux::empty.media
│   ├── x-ux::empty.title
│   └── x-ux::empty.description
└── x-ux::empty.content
```

## Usage

```blade
<x-ux::empty>
    <x-ux::empty.header>
        <x-ux::empty.media variant="icon">
            <x-ux::icon name="folder-code" />
        </x-ux::empty.media>
        <x-ux::empty.title>No Projects Yet</x-ux::empty.title>
        <x-ux::empty.description>
            Create your first project to get started.
        </x-ux::empty.description>
    </x-ux::empty.header>
    <x-ux::empty.content>
        <x-ux::button>Create Project</x-ux::button>
    </x-ux::empty.content>
</x-ux::empty>
```

## Media

`x-ux::empty.media` accepts `variant="default"` or `variant="icon"`. Use `icon` for a single icon in the built-in
surface. Keep the default variant for avatars, avatar groups, images, or custom media.

## Styling

- Add `border border-dashed` to the root for an outlined state.
- Add `bg-muted/30` or another background utility to the root when the state needs separation from its container.
- Put buttons, links, and input groups in Content.
- Use `flex-row justify-center gap-2` on Content for side-by-side actions.
- Keep Title and Description inside Header so their spacing remains correct.
- Wrap isolated RTL content with `x-ux::direction direction="rtl"` and use logical utilities for custom layout.
- Keep custom media proportional to the compact Empty typography; use `size-8` avatars and explicit icon sizes when
  inherited SVG sizing is not reliable.

## Rules

- Describe the empty condition in Title and provide the next useful action in Content.
- Do not use Empty for loading or errors that require alert semantics.
- Avoid decorative media that competes with the primary action.
- Omit Media or Content when they do not add useful information.
