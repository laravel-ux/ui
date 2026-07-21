# Button Group

Use Button Group to visually join related action buttons, inputs, and controls into one compact unit.

## Composition

```text
x-ux::button-group
├── x-ux::button or x-ux::input
├── x-ux::button-group.separator
└── x-ux::button-group.text
```

Button Group may also contain nested Button Groups when related clusters need visible spacing.

## API

### `x-ux::button-group`

| Prop          | Type                   | Default      | Purpose                    |
|---------------|------------------------|--------------|----------------------------|
| `orientation` | `horizontal\|vertical` | `horizontal` | Set the grouping direction.|

### `x-ux::button-group.separator`

| Prop          | Type                   | Default    | Purpose                       |
|---------------|------------------------|------------|-------------------------------|
| `orientation` | `horizontal\|vertical` | `vertical` | Set the separator direction.  |

### `x-ux::button-group.text`

| Prop       | Type      | Default | Purpose                                      |
|------------|-----------|---------|----------------------------------------------|
| `as-child` | `boolean` | `false` | Merge the text wrapper into its child element.|

All parts accept standard HTML attributes and Tailwind classes.

## Basic Group

```blade
<x-ux::button-group aria-label="Document actions">
    <x-ux::button variant="outline">Archive</x-ux::button>
    <x-ux::button variant="outline">Report</x-ux::button>
</x-ux::button-group>
```

Use one accessible group label that describes the controls collectively. Individual icon-only buttons still require their own accessible names.

## Orientation

```blade
<x-ux::button-group orientation="vertical" aria-label="Zoom controls">
    <x-ux::button variant="outline" size="icon" aria-label="Zoom in">
        <x-ux::icon name="plus" />
    </x-ux::button>
    <x-ux::button variant="outline" size="icon" aria-label="Zoom out">
        <x-ux::icon name="minus" />
    </x-ux::button>
</x-ux::button-group>
```

Keep every direct control in the same orientation. Match Separator orientation to the boundary it represents: vertical separators divide horizontal controls, and horizontal separators divide vertical controls.

## Separators and Variants

Outline buttons already provide visible boundaries and normally do not need a Separator. Use Separator between borderless filled buttons when the actions would otherwise blend together.

```blade
<x-ux::button-group aria-label="Clipboard actions">
    <x-ux::button variant="secondary">Copy</x-ux::button>
    <x-ux::button-group.separator />
    <x-ux::button variant="secondary">Paste</x-ux::button>
</x-ux::button-group>
```

Keep the same Button size throughout one joined group. A split action may use an icon-only trailing button at the matching icon size.

## Inputs and Text

```blade
<x-ux::button-group aria-label="Site search">
    <x-ux::button-group.text as-child>
        <x-ux::label for="site-search">Search</x-ux::label>
    </x-ux::button-group.text>
    <x-ux::input id="site-search" placeholder="Type a query..." />
    <x-ux::button variant="outline" aria-label="Submit search">
        <x-ux::icon name="search" />
    </x-ux::button>
</x-ux::button-group>
```

Use `as-child` only with one element that can receive the merged attributes. Associate labels and inputs with matching `for` and `id` values.

## Nested Groups

Use nested groups for separate joined clusters with spacing between them:

```blade
<x-ux::button-group aria-label="Message controls">
    <x-ux::button-group>
        <x-ux::button variant="outline" size="icon" aria-label="Add attachment">
            <x-ux::icon name="plus" />
        </x-ux::button>
    </x-ux::button-group>
    <x-ux::button-group>
        <x-ux::input placeholder="Send a message..." />
        <x-ux::button variant="outline">Send</x-ux::button>
    </x-ux::button-group>
</x-ux::button-group>
```

Do not add manual negative margins or reconstruct joined corners. Button Group owns borders, corner radii, focus stacking, and spacing between nested groups.

## Dropdowns and Popovers

Use `as-child` on an overlay trigger so the Button remains the only interactive element:

```blade
<x-ux::button-group aria-label="Follow options">
    <x-ux::button variant="outline">Follow</x-ux::button>
    <x-ux::dropdown-menu>
        <x-ux::dropdown-menu.trigger as-child>
            <x-ux::button variant="outline" size="icon" aria-label="More follow options">
                <x-ux::icon name="chevron-down" />
            </x-ux::button>
        </x-ux::dropdown-menu.trigger>
        <x-ux::dropdown-menu.content align="end">
            <x-ux::dropdown-menu.item>Mute conversation</x-ux::dropdown-menu.item>
        </x-ux::dropdown-menu.content>
    </x-ux::dropdown-menu>
</x-ux::button-group>
```

The same trigger rule applies to Popover and Tooltip integrations. Never place a Button inside a trigger button without `as-child`.

## Accessibility and RTL

- Button Group renders `role="group"`; add `aria-label` or `aria-labelledby` whenever the surrounding context does not already name it.
- Tab moves through the controls using their native focus order. Do not add arrow-key behavior; use Toggle Group when users are selecting toggle states.
- Preserve the built-in focus ring and focus stacking.
- Set `dir="rtl"` on the group or an ancestor for right-to-left interfaces.
- Mirror only directional icons such as navigation arrows with `rtl:rotate-180`.
- Keep dropdown and popover content direction consistent with the trigger context.

## Avoid

- Do not use Button Group for mutually selectable toggle states; use `x-ux::toggle-group`.
- Do not mix unrelated actions solely to save space.
- Do not mix incompatible Button sizes in one joined group.
- Do not add Separator between outline buttons unless a stronger division is genuinely needed.
- Do not manually remove borders or corners from individual controls.
- Do not nest interactive elements or omit accessible names from icon-only controls.
- Do not add Alpine or JavaScript for grouping; Button Group is a static layout primitive.
