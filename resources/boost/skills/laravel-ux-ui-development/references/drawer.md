# Drawer

Use Drawer for a touch-oriented panel that enters from a viewport edge and can be dismissed by dragging. Use Sheet when
the panel only needs deterministic open and close transitions without gestures or snap points. Use Dialog for centered
modal tasks.

## Composition

```text
x-ux::drawer
├── x-ux::drawer.trigger
└── x-ux::drawer.content
    ├── x-ux::drawer.swipe-handle
    ├── x-ux::drawer.header
    │   ├── x-ux::drawer.title
    │   └── x-ux::drawer.description
    ├── Content
    └── x-ux::drawer.footer
        └── x-ux::drawer.close
```

Keep every part inside one root. Content automatically composes and portals its overlay, viewport, and popup to `body`.

## API

### `x-ux::drawer`

| Prop                          | Type                                      | Default  | Purpose                                                  |
|-------------------------------|-------------------------------------------|----------|----------------------------------------------------------|
| `open`                        | `boolean`                                 | `false`  | Set the initial open state.                              |
| `modal`                       | `true \| false \| "trap-focus"`          | `true`   | Control page interaction and focus trapping.             |
| `show-swipe-handle`           | `boolean`                                 | `false`  | Render the directional drag handle.                      |
| `snap-points`                 | `array<int\|float\|string>`               | `[]`     | Define vertical resting heights.                         |
| `swipe-direction`             | `"up" \| "right" \| "down" \| "left"` | `"down"` | Set the edge and dismiss direction.                      |
| `disable-pointer-dismissal`   | `boolean`                                 | `false`  | Keep outside pointer presses from closing the drawer.    |

### `x-ux::drawer.trigger`

| Prop       | Type      | Default | Purpose                                    |
|------------|-----------|---------|--------------------------------------------|
| `as-child` | `boolean` | `false` | Merge trigger behavior into its one child. |

### `x-ux::drawer.close`

| Prop       | Type      | Default | Purpose                                  |
|------------|-----------|---------|------------------------------------------|
| `as-child` | `boolean` | `false` | Merge close behavior into its one child. |

Header, Footer, Title, Description, Overlay, and Swipe Handle have no custom props. Every part accepts standard HTML
attributes and Tailwind classes.

## Basic Drawer

```blade
<x-ux::drawer show-swipe-handle>
    <x-ux::drawer.trigger as-child>
        <x-ux::button variant="outline">Open Drawer</x-ux::button>
    </x-ux::drawer.trigger>
    <x-ux::drawer.content>
        <x-ux::drawer.header>
            <x-ux::drawer.title>Pick a delivery time</x-ux::drawer.title>
            <x-ux::drawer.description>
                We'll prepare your order as soon as possible.
            </x-ux::drawer.description>
        </x-ux::drawer.header>
        <div class="flex-1 overflow-y-auto p-4">
            {{-- controls --}}
        </div>
        <x-ux::drawer.footer>
            <x-ux::button>Confirm Delivery Time</x-ux::button>
            <x-ux::drawer.close as-child>
                <x-ux::button variant="outline">Cancel</x-ux::button>
            </x-ux::drawer.close>
        </x-ux::drawer.footer>
    </x-ux::drawer.content>
</x-ux::drawer>
```

Use `as-child` whenever Trigger or Close contains a Button. This produces one native button and avoids nested
interactive elements.

## Position and Sizing

- Use `swipe-direction="down"` for a bottom drawer, `up` for top, `right` for the right edge, and `left` for the left
  edge. The value describes the dismiss gesture, not an edge name.
- Vertical drawers size to their content and stop at `calc(100dvh - 6rem)`. Add `h-*` or `max-h-*` to Content when a
  fixed height is required.
- Horizontal drawers use `75%` of the viewport and `24rem` from the `sm` breakpoint. Add `w-*` or `max-w-*` to Content
  to override this.
- Make long content `flex-1 overflow-y-auto`; do not use `h-full` inside a content-sized drawer.

## Snap Points

Snap points apply to vertical drawers. Fractions from `0` through `1` are viewport proportions, numbers greater than
`1` are pixels, and strings accept `px`, `rem`, or `%`.

```blade
<x-ux::drawer :snap-points="['31rem', 1]" show-swipe-handle>
    {{-- parts --}}
</x-ux::drawer>
```

Keep snap points ordered from the smallest to the largest visible height. The drawer opens at the first point and can
be dragged between points or dismissed below the smallest point.

## State and Livewire

Use `open` only for the initial state. Bind `x-model` to the root when client code must control the drawer. Use
`wire:model` only when the server needs to know whether it is open, and back it with a boolean property.

The component owns pointer gestures, Escape, focus placement and restoration, focus trapping, outside dismissal, ARIA
relationships, and document scroll locking. Do not duplicate these behaviors in application JavaScript.

## Modal Behavior

- Keep the default `modal="true"` for tasks that temporarily make the rest of the page unavailable.
- Use `:modal="false"` when the page must remain interactive. Add `disable-pointer-dismissal` when outside presses
  should not close that drawer.
- Use `modal="trap-focus"` to contain keyboard focus while leaving page scrolling and pointer interaction available.
- Always include Title. Include Description when the title does not fully explain the panel.

## Nested Drawers

Place a complete Drawer inside the parent Content or Footer. Do not move a nested root outside the parent composition.
Each drawer manages its own focus and gesture state while the parent stays mounted.

## Accessibility and RTL

- Trigger receives `aria-haspopup`, `aria-expanded`, and `aria-controls` automatically.
- Content receives `role="dialog"` and automatic Title and Description references.
- Provide visible text or an `aria-label` for custom icon-only close controls.
- Direction portal support preserves the nearest `x-ux::direction` value.
- `left` and `right` are physical swipe directions. Choose them explicitly for the intended edge; do not assume they
  mirror automatically in RTL.
- Elements that must never initiate a swipe can receive `data-drawer-swipe-ignore`.

## Avoid

- Do not use Drawer as a renamed Sheet when no touch gestures are required.
- Do not nest a Button inside Trigger or Close without `as-child`.
- Do not add custom fixed overlays, `x-show`, swipe listeners, focus traps, or body scroll locking.
- Do not put the scrolling behavior on the entire popup; make a body region the scroll container.
- Do not use horizontal snap points; use vertical `up` or `down` drawers for snap-point interfaces.
