# Separator

Use `x-ux::separator` to visually or semantically divide content.

## API

| Prop          | Values                   | Default      |
|---------------|--------------------------|--------------|
| `orientation` | `horizontal`, `vertical` | `horizontal` |
| `decorative`  | boolean                  | `true`       |

## Example

```blade
<div class="flex h-5 items-center gap-4 text-sm">
    <span>Blog</span>
    <x-ux::separator orientation="vertical" />
    <span>Docs</span>
</div>
```

## Rules

- Keep `decorative` enabled when the separator only provides visual grouping.
- Set `:decorative="false"` when it marks a meaningful boundary that assistive technology should announce.
- Use a vertical separator inside a flex row; its built-in `self-stretch` supplies the height.
- Do not use a separator in place of spacing when no visual or semantic boundary is needed.
