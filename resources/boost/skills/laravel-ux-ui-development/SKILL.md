---
name: laravel-ux-ui-development
description: "Build and modify Laravel Blade or Livewire interfaces with the laravel-ux/ui component library. Use when a task mentions Laravel UX UI, x-ux Blade components, shadcn-style UI in Laravel, or asks to add, configure, compose, style, debug, or integrate any x-ux:: component such as accordion, alert, dialog, input, select, sidebar, tabs, or tooltip."
---

# Laravel UX UI Development

Use the package's Blade components instead of recreating shadcn/ui markup or copying React components.

## Workflow

1. Identify the requested UI primitive and interaction requirements.
2. Read the matching reference before writing markup:
   - Accordion: [references/accordion.md](references/accordion.md)
   - Alert: [references/alert.md](references/alert.md)
   - Aspect Ratio: [references/aspect-ratio.md](references/aspect-ratio.md)
   - Attachment: [references/attachment.md](references/attachment.md)
   - Avatar: [references/avatar.md](references/avatar.md)
   - Badge: [references/badge.md](references/badge.md)
   - Breadcrumb: [references/breadcrumb.md](references/breadcrumb.md)
   - Button: [references/button.md](references/button.md)
   - Button Group: [references/button-group.md](references/button-group.md)
   - Card: [references/card.md](references/card.md)
   - Checkbox: [references/checkbox.md](references/checkbox.md)
   - Collapsible: [references/collapsible.md](references/collapsible.md)
   - Dialog: [references/dialog.md](references/dialog.md)
   - Dropdown Menu: [references/dropdown-menu.md](references/dropdown-menu.md)
   - Table: [references/table.md](references/table.md)
3. Inspect nearby Blade or Livewire code and follow its spacing, width, typography, and state conventions.
4. Compose the documented `x-ux::` components. Pass documented props exactly and put additional Tailwind utilities in `class`.
5. Preserve built-in accessibility attributes and Alpine behavior. Do not duplicate them with custom JavaScript.
6. Render or build the smallest relevant surface after editing.

## Core Rules

- Use the `x-ux::` namespace in application markup.
- Adapt shadcn/ui examples to Blade syntax; never paste React imports, JSX, `className`, or React prop syntax.
- Use `:prop="..."` for PHP expressions, arrays, numbers, and booleans. Use plain attributes for literal strings.
- Prefer documented component props and composition over custom selectors or replacement markup.
- Merge layout-specific styling through `class`; the components resolve Tailwind class conflicts.
- Use `x-ux::icon` with kebab-case Lucide names when an example needs an icon.
- Do not add `x-data`, Alpine directives, ARIA state, or a JS plugin unless the component reference explicitly requires application-owned state.
- Keep item values stable and unique when a component uses value-based state.
- Treat package view or plugin changes as component maintenance. For ordinary application work, consume the public API instead.

## Validation

- Verify that every used component and prop exists in its reference.
- Check responsive layout, dark mode, keyboard behavior, and right-to-left layout when relevant.
- For Livewire state, confirm that the PHP property type matches the component value type.
- Run the application's existing formatter, focused test, or frontend build when the change warrants it.
