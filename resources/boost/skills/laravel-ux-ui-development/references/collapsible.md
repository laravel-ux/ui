# Collapsible

Use Collapsible to reveal or hide one related content panel without introducing modal behavior.

## Composition

```text
x-ux::collapsible
├── x-ux::collapsible.trigger
└── x-ux::collapsible.content
```

Keep Trigger and Content inside the same root. A root should normally control one Content panel.

## API

### `x-ux::collapsible`

| Prop       | Type      | Default | Purpose                         |
|------------|-----------|---------|---------------------------------|
| `open`     | `boolean` | `false` | Set the initial open state.     |
| `disabled` | `boolean` | `false` | Prevent the state from changing.|

### `x-ux::collapsible.trigger`

| Prop       | Type      | Default | Purpose                                   |
|------------|-----------|---------|-------------------------------------------|
| `as-child` | `boolean` | `false` | Merge trigger behavior into its one child.|

Content has no custom props. All parts accept standard HTML attributes and Tailwind classes.

## Basic Collapsible

```blade
<x-ux::collapsible>
    <x-ux::collapsible.trigger as-child>
        <x-ux::button variant="ghost">
            Product details
            <x-ux::icon
                name="chevron-down"
                data-icon="inline-end"
                class="transition-transform group-data-panel-open/button:rotate-180"
            />
        </x-ux::button>
    </x-ux::collapsible.trigger>
    <x-ux::collapsible.content class="pt-2 text-sm text-muted-foreground">
        Additional product information.
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

Use `as-child` when the trigger is an `x-ux::button`. This keeps one interactive element and preserves Button styling.

## Initial and Controlled State

Open the panel initially:

```blade
<x-ux::collapsible open>
    {{-- trigger and content --}}
</x-ux::collapsible>
```

Use `x-model` for client-owned state:

```blade
<div x-data="{ detailsOpen: false }">
    <x-ux::collapsible x-model="detailsOpen">
        <x-ux::collapsible.trigger>Toggle details</x-ux::collapsible.trigger>
        <x-ux::collapsible.content>Details</x-ux::collapsible.content>
    </x-ux::collapsible>
</div>
```

Use `wire:model` only when the server needs the current open state. Back it with a boolean property.

## Disabled State

```blade
<x-ux::collapsible disabled>
    <x-ux::collapsible.trigger>Managed details</x-ux::collapsible.trigger>
    <x-ux::collapsible.content>Unavailable content</x-ux::collapsible.content>
</x-ux::collapsible>
```

Disabled prevents state changes and marks the Trigger as disabled. Do not use disabled merely to hide unavailable information; explain why the control is unavailable when that context matters.

## Nested Collapsibles

Nested roots are appropriate for hierarchical interfaces such as file trees:

```blade
<x-ux::collapsible>
    <x-ux::collapsible.trigger as-child>
        <x-ux::button variant="ghost" class="group w-full justify-start">
            <x-ux::icon name="chevron-right" class="transition-transform group-data-panel-open/button:rotate-90" />
            <x-ux::icon name="folder" />
            Components
        </x-ux::button>
    </x-ux::collapsible.trigger>
    <x-ux::collapsible.content class="ms-5 pt-1">
        <x-ux::collapsible>
            {{-- nested trigger and content --}}
        </x-ux::collapsible>
    </x-ux::collapsible.content>
</x-ux::collapsible>
```

Use logical indentation such as `ms-5` so hierarchy works in LTR and RTL. Keep nesting shallow enough that users can understand their current level.

## Animation and Styling

Content expansion and collapse are handled by the package plugin. Style the provided Content element rather than adding another `x-show` or `x-collapse` wrapper.

The root exposes `data-open`, `data-closed`, and `data-state`. Trigger exposes `data-panel-open` while expanded. Use these state hooks for presentation only:

```blade
<x-ux::collapsible class="rounded-md data-open:bg-muted">
    {{-- parts --}}
</x-ux::collapsible>
```

Do not set these attributes manually; they are synchronized with the actual open state.

## Accessibility and RTL

- Trigger renders a `type="button"` by default.
- Trigger receives `aria-expanded`, `aria-controls`, and disabled semantics automatically.
- Content receives a stable ID and matching `aria-labelledby`.
- Enter and Space activate a button trigger using native keyboard behavior.
- Give icon-only triggers an `aria-label` or visually hidden label.
- Set `dir="rtl"` on the root or an ancestor for right-to-left content.
- Mirror directional tree chevrons when their direction communicates hierarchy; neutral up/down icons need no mirroring.

## Avoid

- Do not use React names, JSX props, `defaultOpen`, or `onOpenChange` in Blade.
- Do not nest a Button inside the default Trigger without `as-child`.
- Do not manually add `x-show`, `x-collapse`, `aria-expanded`, or state data attributes.
- Do not use Collapsible for mutually exclusive sections; use Accordion.
- Do not use Collapsible for modal or floating content; use Dialog, Popover, or Dropdown Menu.
- Do not hide critical required information behind a collapsed panel without a clear trigger label.
