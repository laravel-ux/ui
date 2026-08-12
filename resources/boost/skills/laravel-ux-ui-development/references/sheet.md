# Sheet

Use Sheet for complementary content that slides in from an edge of the screen, such as settings, filters, or mobile
navigation. Use Dialog instead when the task requires centered, blocking attention.

## Composition

```text
x-ux::sheet
├── x-ux::sheet.trigger
└── x-ux::sheet.content
    ├── x-ux::sheet.header
    │   ├── x-ux::sheet.title
    │   └── x-ux::sheet.description
    ├── Content
    ├── x-ux::sheet.footer
    └── x-ux::sheet.close
```

Keep all parts inside one root. Content and Overlay are portaled to `body`; do not add custom fixed-position wrappers
or overlays.

## API

### `x-ux::sheet`

| Prop   | Type      | Default | Purpose                     |
|--------|-----------|---------|-----------------------------|
| `open` | `boolean` | `false` | Set the initial open state. |

### `x-ux::sheet.trigger`

| Prop       | Type      | Default | Purpose                                    |
|------------|-----------|---------|--------------------------------------------|
| `as-child` | `boolean` | `false` | Merge trigger behavior into its one child. |

### `x-ux::sheet.content`

| Prop                | Type                                           | Default   | Purpose                              |
|---------------------|------------------------------------------------|-----------|--------------------------------------|
| `side`              | `top`, `right`, `bottom`, `left`               | `right`   | Select the edge the panel enters from. |
| `show-close-button` | `boolean`                                      | `true`    | Render the top-corner close control. |

### `x-ux::sheet.close`

| Prop       | Type      | Default | Purpose                                  |
|------------|-----------|---------|------------------------------------------|
| `as-child` | `boolean` | `false` | Merge close behavior into its one child. |

Header, Footer, Title, Description, and Overlay have no custom props. Every part accepts standard HTML attributes and
Tailwind classes.

## Basic Sheet

```blade
<x-ux::sheet>
    <x-ux::sheet.trigger as-child>
        <x-ux::button variant="outline">Edit profile</x-ux::button>
    </x-ux::sheet.trigger>
    <x-ux::sheet.content>
        <x-ux::sheet.header>
            <x-ux::sheet.title>Edit profile</x-ux::sheet.title>
            <x-ux::sheet.description>
                Make changes to your profile here. Click save when you're done.
            </x-ux::sheet.description>
        </x-ux::sheet.header>
        <div class="grid flex-1 auto-rows-min gap-6 px-4">
            {{-- fields --}}
        </div>
        <x-ux::sheet.footer>
            <x-ux::button type="submit">Save changes</x-ux::button>
            <x-ux::sheet.close as-child>
                <x-ux::button variant="outline">Close</x-ux::button>
            </x-ux::sheet.close>
        </x-ux::sheet.footer>
    </x-ux::sheet.content>
</x-ux::sheet>
```

Use `as-child` when Trigger or Close contains another interactive component. This produces one button instead of nested
interactive elements.

## Side and Sizing

- Content enters from `right` by default. Set `side` to `top`, `bottom`, or `left` when the interaction requires it.
- Left and right sheets use `w-3/4 sm:max-w-sm` by default. Override width through `class` when the content needs more
  room.
- Top and bottom sheets size to their content. Add a maximum height and an overflow region for long content.
- Style a specific edge with the exposed `data-side` attribute, for example
  `data-[side=bottom]:max-h-[50vh] data-[side=top]:max-h-[50vh]`.

## State

Open the sheet initially with `<x-ux::sheet open>`. For client-owned state, bind the root with `x-model`. Use
`wire:model` only when the server must know whether the sheet is open, and back it with a boolean property.

The component manages focus, Escape, focus restoration, outside click, ARIA relationships, and document scroll locking.
Do not reproduce those behaviors in application code.

## Accessibility and RTL

- Always include a concise Title. Add a Description when the title alone does not explain the panel.
- Use `:show-close-button="false"` only when another clearly labelled close control is present.
- Provide visible text or an `aria-label` for every custom icon-only Close control.
- Wrap isolated right-to-left sheets with `x-ux::direction`; use logical `start` and `end` utilities for custom layout.
- Choose `side="left"` or `side="right"` intentionally for RTL interfaces; direction does not change the explicit side.

## Avoid

- Do not nest a Button inside Trigger or Close without `as-child`.
- Do not add `x-show`, custom Escape listeners, focus traps, overlays, or body scroll locking.
- Do not omit Title merely to achieve a visual design; hide it with `sr-only` when necessary.
- Do not use Sheet for a centered confirmation or destructive decision; use Dialog or Alert Dialog.
- Do not make the whole Content panel scroll when Header and Footer should remain visible; scroll the body region.
