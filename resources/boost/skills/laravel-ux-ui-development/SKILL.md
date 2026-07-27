---
name: laravel-ux-ui-development
description: "Build and modify Laravel Blade or Livewire interfaces with the laravel-ux/ui component library. Use when a task mentions Laravel UX UI, x-ux Blade components, shadcn-style UI in Laravel, or asks to add, configure, compose, style, debug, or integrate any x-ux:: component such as accordion, alert, dialog, input, select, sheet, sidebar, skeleton, spinner, switch, tabs, textarea, toast, toggle, toggle group, or tooltip."
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
   - Bubble: [references/bubble.md](references/bubble.md)
   - Button: [references/button.md](references/button.md)
   - Button Group: [references/button-group.md](references/button-group.md)
   - Card: [references/card.md](references/card.md)
   - Checkbox: [references/checkbox.md](references/checkbox.md)
   - Collapsible: [references/collapsible.md](references/collapsible.md)
   - Dialog: [references/dialog.md](references/dialog.md)
   - Direction: [references/direction.md](references/direction.md)
   - Drawer: [references/drawer.md](references/drawer.md)
   - Dropdown Menu: [references/dropdown-menu.md](references/dropdown-menu.md)
   - Empty: [references/empty.md](references/empty.md)
   - Field: [references/field.md](references/field.md)
   - Hover Card: [references/hover-card.md](references/hover-card.md)
   - Input: [references/input.md](references/input.md)
   - Input Group: [references/input-group.md](references/input-group.md)
   - Input OTP: [references/input-otp.md](references/input-otp.md)
   - Item: [references/item.md](references/item.md)
   - Kbd: [references/kbd.md](references/kbd.md)
   - Label: [references/label.md](references/label.md)
   - Marker: [references/marker.md](references/marker.md)
   - Message: [references/message.md](references/message.md)
   - Message Scroller: [references/message-scroller.md](references/message-scroller.md)
   - Navigation Menu: [references/navigation-menu.md](references/navigation-menu.md)
   - Pagination: [references/pagination.md](references/pagination.md)
   - Popover: [references/popover.md](references/popover.md)
   - Progress: [references/progress.md](references/progress.md)
   - Radio Group: [references/radio-group.md](references/radio-group.md)
   - Select: [references/select.md](references/select.md)
   - Separator: [references/separator.md](references/separator.md)
   - Sheet: [references/sheet.md](references/sheet.md)
   - Skeleton: [references/skeleton.md](references/skeleton.md)
   - Slider: [references/slider.md](references/slider.md)
   - Spinner: [references/spinner.md](references/spinner.md)
   - Switch: [references/switch.md](references/switch.md)
   - Table: [references/table.md](references/table.md)
   - Tabs: [references/tabs.md](references/tabs.md)
   - Textarea: [references/textarea.md](references/textarea.md)
   - Toast: [references/toast.md](references/toast.md)
   - Toggle: [references/toggle.md](references/toggle.md)
   - Toggle Group: [references/toggle-group.md](references/toggle-group.md)
   - Tooltip: [references/tooltip.md](references/tooltip.md)
3. Inspect nearby Blade or Livewire code and follow its spacing, width, typography, and state conventions.
4. Compose the documented `x-ux::` components. Pass documented props exactly and put additional Tailwind utilities in `class`.
5. Preserve built-in accessibility attributes and Alpine behavior. Do not duplicate them with custom JavaScript.
6. Render or build the smallest relevant surface after editing.

## Core Rules

- Use the `x-ux::` namespace in application markup.
- Wrap component names in inline code in Markdown prose, for example `x-ux::button`; use angle brackets only inside Blade code blocks.
- Adapt shadcn/ui examples to Blade syntax; never paste React imports, JSX, `className`, or React prop syntax.
- Adapt example copy to the Laravel ecosystem; do not retain React, Next.js, or Vercel branding from upstream examples.
- Keep rendered source-code panes width-constrained with horizontal scrolling, `dir="ltr"`, and bidi isolation. Long lines and RTL preview content must not expand or reorder the documentation layout.
- Use `:prop="..."` for PHP expressions, arrays, numbers, and booleans. Use plain attributes for literal strings.
- Prefer documented component props and composition over custom selectors or replacement markup.
- Merge layout-specific styling through `class`; the components resolve Tailwind class conflicts.
- Follow the `laravel-ux-icons-development` skill for icon names, sizing, placement, accessibility, and RTL behavior.
- Do not add `x-data`, Alpine directives, ARIA state, or a JS plugin unless the component reference explicitly requires application-owned state.
- Keep item values stable and unique when a component uses value-based state.
- Treat package view or plugin changes as component maintenance. For ordinary application work, consume the public API instead.

## Validation

- Verify that every used component and prop exists in its reference.
- Check responsive layout, dark mode, keyboard behavior, and right-to-left layout when relevant.
- For Livewire state, confirm that the PHP property type matches the component value type.
- Run the application's existing formatter, focused test, or frontend build when the change warrants it.
