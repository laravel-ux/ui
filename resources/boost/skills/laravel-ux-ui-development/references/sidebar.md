# Sidebar

Use Sidebar for application-level navigation that needs a persistent desktop layout and a mobile Sheet. Do not use it
for short complementary panels; use Sheet for those.

## Composition

```text
x-ux::sidebar.provider
├── x-ux::sidebar
│   ├── x-ux::sidebar.header
│   │   └── x-ux::sidebar.input
│   ├── x-ux::sidebar.content
│   │   └── x-ux::sidebar.group
│   │       ├── x-ux::sidebar.group.label
│   │       ├── x-ux::sidebar.group.action
│   │       └── x-ux::sidebar.group.content
│   │           └── x-ux::sidebar.menu
│   │               └── x-ux::sidebar.menu.item
│   │                   ├── x-ux::sidebar.menu.button
│   │                   ├── x-ux::sidebar.menu.action
│   │                   ├── x-ux::sidebar.menu.badge
│   │                   └── x-ux::sidebar.menu.sub
│   │                       └── x-ux::sidebar.menu.sub.item
│   │                           └── x-ux::sidebar.menu.sub.button
│   ├── x-ux::sidebar.footer
│   └── x-ux::sidebar.rail
└── x-ux::sidebar.inset
    └── x-ux::sidebar.trigger
```

Keep Sidebar and Inset as siblings inside one Provider. Put Header and Footer outside Content so only Content scrolls.

## API

### `x-ux::sidebar.provider`

| Prop           | Type      | Default | Purpose                     |
| -------------- | --------- | ------- | --------------------------- |
| `open`         | `boolean` | `true`  | Set initial desktop state.  |
| `width`        | `string`  | `16rem` | Set expanded desktop width. |
| `width-icon`   | `string`  | `3rem`  | Set collapsed icon width.   |
| `width-mobile` | `string`  | `18rem` | Set mobile Sheet width.     |

The Provider exposes desktop state through `x-model` and `wire:model`. Mobile state is deliberately independent.
Trigger, Rail, and `Ctrl+B`/`Cmd+B` call the same responsive toggle. Desktop changes are stored in the
`sidebar_state` cookie for seven days.

### `x-ux::sidebar`

| Prop          | Values                         | Default     |
| ------------- | ------------------------------ | ----------- |
| `side`        | `left`, `right`                | `left`      |
| `variant`     | `sidebar`, `floating`, `inset` | `sidebar`   |
| `collapsible` | `offcanvas`, `icon`, `none`    | `offcanvas` |
| `dir`         | `ltr`, `rtl`                   | inherited   |

Use Inset with the `inset` variant. `none` disables both desktop collapse and the mobile Sheet.

### `x-ux::sidebar.menu.button`

| Prop      | Values                | Default   |
| --------- | --------------------- | --------- |
| `active`  | `boolean`             | `false`   |
| `variant` | `default`, `outline`  | `default` |
| `size`    | `sm`, `default`, `lg` | `default` |
| `tooltip` | `string`              | `null`    |

It renders an anchor when `href` is present and a button otherwise. Use `tooltip` for every icon-only collapsed item.

### Other props

- Group Label and Group Action accept `as-child`.
- Menu Action accepts `as-child` and `show-on-hover`.
- Menu Skeleton accepts `show-icon`.
- Menu Sub Button accepts `active` and `size="sm|md"`.

## Basic Pattern

```blade
<x-ux::sidebar.provider>
    <x-ux::sidebar collapsible="icon">
        <x-ux::sidebar.content>
            <x-ux::sidebar.group>
                <x-ux::sidebar.group.label>Application</x-ux::sidebar.group.label>
                <x-ux::sidebar.group.content>
                    <x-ux::sidebar.menu>
                        <x-ux::sidebar.menu.item>
                            <x-ux::sidebar.menu.button href="/dashboard" active tooltip="Dashboard">
                                <x-ux::icon name="house" />
                                <span>Dashboard</span>
                            </x-ux::sidebar.menu.button>
                        </x-ux::sidebar.menu.item>
                    </x-ux::sidebar.menu>
                </x-ux::sidebar.group.content>
            </x-ux::sidebar.group>
        </x-ux::sidebar.content>
        <x-ux::sidebar.rail />
    </x-ux::sidebar>
    <x-ux::sidebar.inset>
        <header class="flex h-12 items-center px-4">
            <x-ux::sidebar.trigger />
        </header>
        <main class="p-4">Content</main>
    </x-ux::sidebar.inset>
</x-ux::sidebar.provider>
```

## State

- Use `x-model` for client-owned desktop state. Use `wire:model` only when the server needs that state.
- To restore the cookie during server rendering, set
  `:open="request()->cookie('sidebar_state', 'true') === 'true'"` on Provider.
- Do not bind the mobile Sheet separately or add another responsive breakpoint listener.
- Style application-specific state through exposed `data-slot`, `data-sidebar`, `data-state`, `data-side`,
  `data-variant`, and `data-collapsible` attributes.

## Accessibility and RTL

- Keep visible labels in the final `span` of Menu Button so truncation works.
- Label custom icon-only Group or Menu Actions.
- Do not remove Trigger's hidden label or Rail's label/title.
- For RTL, wrap the layout with `x-ux::direction direction="rtl"`, set Sidebar `side="right"`, and pass `dir="rtl"`
  so the portaled mobile Sheet keeps the correct direction.
- Prefer logical spacing (`ms`, `me`, `start`, `end`) in custom sidebar content.

## Avoid

- Do not recreate the mobile Sheet, collapse transitions, shortcut, or cookie persistence in application JavaScript.
- Do not put Sidebar outside Provider.
- Do not place interactive controls inside Menu Button; use Menu Action as its sibling.
- Do not hide icon-mode labels without tooltips.
- Do not make Header and Footer part of the scrolling Content region unless that behavior is intentional.
