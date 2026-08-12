# Sidebar

A composable, responsive application sidebar with desktop collapse modes and a mobile Sheet.

```blade iframe
sidebars/sidebar-demo
```

## Usage

Wrap the sidebar and the page content in `x-ux::sidebar.provider`. Place `x-ux::sidebar.inset` after the sidebar when the
main content should participate in the sidebar layout.

```blade
<x-ux::sidebar.provider>
    <x-ux::sidebar>
        <x-ux::sidebar.header>
            Header
        </x-ux::sidebar.header>
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
        <x-ux::sidebar.footer>Footer</x-ux::sidebar.footer>
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

The Trigger, Rail, and `Ctrl+B` or `Cmd+B` shortcut all use the same responsive toggle. On mobile, the sidebar opens in
a Sheet without changing the saved desktop state.

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
│   ├── x-ux::sidebar.separator
│   ├── x-ux::sidebar.footer
│   └── x-ux::sidebar.rail
└── x-ux::sidebar.inset
    └── x-ux::sidebar.trigger
```

`x-ux::sidebar.menu.skeleton` can replace menu items while their content is loading.

## Provider

The Provider owns desktop state, mobile state, the keyboard shortcut, and these CSS variables:

| Prop           | Type      | Default | CSS variable             |
| -------------- | --------- | ------- | ------------------------ |
| `open`         | `boolean` | `true`  | —                        |
| `width`        | `string`  | `16rem` | `--sidebar-width`        |
| `width-icon`   | `string`  | `3rem`  | `--sidebar-width-icon`   |
| `width-mobile` | `string`  | `18rem` | `--sidebar-width-mobile` |

Use the props when the entire Sidebar needs a different width. Use ordinary Tailwind classes for content inside it.

```blade
<x-ux::sidebar.provider width="18rem" width-icon="3.5rem" width-mobile="20rem">
    {{-- Sidebar and content --}}
</x-ux::sidebar.provider>
```

Desktop state is written to the `sidebar_state` cookie for seven days. To restore it during server rendering, pass the
cookie back as the initial state:

```blade
<x-ux::sidebar.provider :open="request()->cookie('sidebar_state', 'true') === 'true'">
    {{-- Sidebar and content --}}
</x-ux::sidebar.provider>
```

## Controlled State

Bind the Provider with `x-model` when other Alpine controls need to read or change the desktop state. The mobile Sheet
continues to use its own state.

```blade iframe
sidebars/sidebar-controlled
```

The same model can be bound with `wire:model` when Livewire must own the desktop state.

## Side, Variant, and Collapse Mode

`x-ux::sidebar` accepts the following layout props:

| Prop          | Values                         | Default     |
| ------------- | ------------------------------ | ----------- |
| `side`        | `left`, `right`                | `left`      |
| `variant`     | `sidebar`, `floating`, `inset` | `sidebar`   |
| `collapsible` | `offcanvas`, `icon`, `none`    | `offcanvas` |
| `dir`         | `ltr`, `rtl`                   | inherited   |

- `offcanvas` moves the full desktop sidebar outside the viewport when collapsed.
- `icon` keeps a compact icon rail. Add `tooltip` to menu buttons so their labels remain available.
- `none` renders a fixed-width, non-collapsible sidebar and does not create a mobile Sheet.
- `floating` adds an inset card treatment to the sidebar itself.
- `inset` is designed to be paired with `x-ux::sidebar.inset`.

## Header and Footer

Header and Footer are sticky composition regions outside the scrolling Content area. A workspace switcher usually goes
in Header, while account or settings controls usually go in Footer.

```blade iframe
sidebars/sidebar-header
```

```blade iframe
sidebars/sidebar-footer
```

Use `x-ux::sidebar.input` for a search or filter field that follows the sidebar sizing and data-slot contract.

## Groups

Use Group to organize related menu items. Label and Action disappear automatically when an icon Sidebar is collapsed.
Both `x-ux::sidebar.group.label` and `x-ux::sidebar.group.action` support `as-child`.

```blade iframe
sidebars/sidebar-group-action
```

## Menu

Menu Button renders an anchor when `href` is present and a button otherwise.

| Prop      | Values                | Default   |
| --------- | --------------------- | --------- |
| `active`  | `boolean`             | `false`   |
| `variant` | `default`, `outline`  | `default` |
| `size`    | `sm`, `default`, `lg` | `default` |
| `tooltip` | `string`              | `null`    |

Put Menu Action and Menu Badge next to Menu Button inside the same Menu Item. Set `show-on-hover` on Menu Action when
the action should remain hidden until its item is hovered or focused. Menu Action supports `as-child` for custom
interactive elements.

```blade iframe
sidebars/sidebar-menu-action
```

```blade iframe
sidebars/sidebar-menu-badge
```

Use Menu Sub for persistent nesting, or combine it with Collapsible when nested items should expand on demand.

```blade iframe tall
sidebars/sidebar-menu-collapsible
```

Menu Sub Button accepts `active` and `size="sm|md"`.

## RTL

Wrap an isolated right-to-left layout with `x-ux::direction`, set `side="right"`, and pass `dir="rtl"` to the Sidebar so
the mobile Sheet portal receives the same direction. Built-in rails, trigger icons, actions, badges, and submenus use the
correct physical or logical alignment.

```blade iframe
sidebars/sidebar-rtl
```

## Accessibility

- Trigger includes an accessible label and supports keyboard activation.
- Rail has a label and title but stays out of sequential keyboard navigation.
- The mobile Sidebar supplies a hidden Sheet title and description.
- Add `tooltip` to every icon-only Menu Button in `collapsible="icon"` mode.
- Keep visible menu labels in a final `span`; truncation targets that element.
- Do not add custom keyboard listeners, mobile dialogs, or duplicate collapse state around the Provider.

## Publishing

This component works out of the box, but you can publish its Blade views if you need to make structural or styling
changes.

```shell
php artisan vendor:publish --tag=ux-sidebar --force
```
