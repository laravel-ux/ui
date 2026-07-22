# Marker

Use `x-ux::marker` for compact status updates, system notes, bordered rows, and labeled dividers in conversation interfaces.

## Composition

```blade
<x-ux::marker role="status">
    <x-ux::marker.icon><x-ux::spinner /></x-ux::marker.icon>
    <x-ux::marker.content>Running tests</x-ux::marker.content>
</x-ux::marker>
```

## Rules

- Keep `variant` within `default`, `border`, or `separator`.
- Use `role="status"` for live or in-progress updates.
- Keep `x-ux::marker.icon` decorative; it is hidden from assistive technology.
- Do not add `role="separator"` to a labeled separator marker.
- Use `as-child` with a real anchor or button for interactive markers.
- Apply `shimmer` to `x-ux::marker.content` only for streaming status text.
